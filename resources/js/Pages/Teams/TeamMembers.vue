<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="team-members">
            <h2 class="intro-y text-lg font-medium mt-10">
                Team Members
            </h2>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <!-- BEGIN: Team Menu -->
                <side-nav :team="teamDetails" :user="user"></side-nav>
                <!-- END: Team Menu -->
                <div class="col-span-12 mt-5 lg:col-span-8 2xl:col-span-9">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center">
                        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                                <input type="text" class="form-control w-56 box pr-10 placeholder-theme-8" v-model="form.search" placeholder="Search...">
                                <SearchIcon class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" size="1.5x"></SearchIcon>
                            </div>
                        </div>
                        <div class="hidden md:block mx-auto text-gray-600"></div>
                        <button class="btn btn-primary shadow-md mr-2">Add Team Member</button>
                    </div>
                    <!-- BEGIN: Users Layout -->
                    <div v-if="members.data.length > 0">
                        <div class="mt-5">
                            <team-member-item :member="member" v-for="member in members.data" :key="member.id">
                                <!-- Manage Team Member Role -->
                                <button class="btn btn-outline-secondary py-1 px-2 mr-2"
                                        @click="manageRole(member)"
                                        v-if="permissions.canAddTeamMembers && availableRoles.length">
                                    {{ displayableRole(member.membership.role) }}
                                </button>

                                <div class="ml-2 text-sm text-gray-400 py-1 px-2 mr-2" v-else-if="availableRoles.length">
                                    {{ displayableRole(member.membership.role) }}
                                </div>

                                <!-- Leave Team -->
                                <button class="btn btn-danger py-1 px-2 mr-2"
                                        @click="confirmLeavingTeam"
                                        v-if="$page.props.user.id === member.id">
                                    Leave
                                </button>

                                <!-- Remove Team Member -->
                                <button class="btn btn-danger py-1 px-2 mr-2"
                                        @click="confirmTeamMemberRemoval(member)"
                                        v-if="permissions.canRemoveTeamMembers">
                                    Remove
                                </button>
                            </team-member-item>
                        </div>
                        <!-- BEGIN: Users Layout -->
                        <!-- END: Pagination -->
                        <custom-paginate :links="members.links"></custom-paginate>
                        <!-- END: Pagination -->
                    </div>
                    <div class="empty-state" v-else>
                        <empty-state title="OOPS! No team members found" description="Get started by creating a new member.">

                        </empty-state>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->

        <!-- Role Management Modal -->
        <dialog-modal :show="currentlyManagingRole" @close="currentlyManagingRole = false">
            <template #title>
                Manage Role
            </template>

            <template #content>
                <div v-if="managingRoleFor">
                    <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                        <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                                :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i !== Object.keys(availableRoles).length - 1}"
                                @click="updateRoleForm.role = role.key"
                                v-for="(role, i) in availableRoles"
                                :key="role.key">
                            <div :class="{'opacity-50': updateRoleForm.role && updateRoleForm.role !== role.key}">
                                <!-- Role Name -->
                                <div class="flex items-center">
                                    <div class="text-sm text-gray-600" :class="{'font-semibold': updateRoleForm.role === role.key}">
                                        {{ role.name }}
                                    </div>

                                    <svg v-if="updateRoleForm.role === role.key" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>

                                <!-- Role Description -->
                                <div class="mt-2 text-xs text-gray-600">
                                    {{ role.description }}
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </template>

            <template #footer>
                <button class="btn btn-secondary w-auto" @click="closeManageRole">
                    Cancel
                </button>
                <button class="btn btn-primary w-auto ml-2" @click="updateRole" :class="{ 'opacity-25': updateRoleForm.processing }" :disabled="updateRoleForm.processing">
                    Save
                </button>
            </template>
        </dialog-modal>

        <!-- Leave Team Confirmation Modal -->
        <confirmation-modal :show="confirmingLeavingTeam" @close="confirmingLeavingTeam = false">
            <template #title>
                Leave Team
            </template>

            <template #content>
                Are you sure you would like to leave this team?
            </template>

            <template #footer>
                <button class="btn btn-secondary w-auto" @click="closeLeavingTeam">Cancel</button>

                <button class="btn btn-danger w-auto ml-2" @click="leaveTeam" :class="{ 'opacity-25': leaveTeamForm.processing }" :disabled="leaveTeamForm.processing">
                    Leave
                </button>
            </template>
        </confirmation-modal>

        <!-- Remove Team Member Confirmation Modal -->
        <confirmation-modal :show="teamMemberBeingRemoved" @close="teamMemberBeingRemoved = null">
            <template #title>
                Remove Team Member
            </template>

            <template #content>
                Are you sure you would like to remove this person from the team?
            </template>

            <template #footer>
                <button class="btn btn-secondary w-auto" @click="closeTeamMemberRemoval">
                    Cancel
                </button>
                <button class="btn btn-danger w-auto ml-2" @click="removeTeamMember" :class="{ 'opacity-25': removeTeamMemberForm.processing }" :disabled="removeTeamMemberForm.processing">
                    Remove
                </button>
            </template>
        </confirmation-modal>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import TeamMemberItem from "../../Components/Team/TeamMemberItem";
import {InertiaLink} from "@inertiajs/inertia-vue";
import { SearchIcon } from 'vue-feather-icons';
import SideNav from "@/Components/Team/SideNav";
import ConfirmationModal from "@/Components/Modals/ConfirmationModal";
import CustomPaginate from "@/Components/Common/CustomPaginate";
import DialogModal from "../../Components/Modals/DialogModal";
import pickBy from 'lodash/pickBy';
import throttle from 'lodash/throttle';
import EmptyState from "../../Components/Common/EmptyState";

export default {
    name: "TeamMembers",
    props: [
        'user',
        'members',
        'teamDetails',
        'availableRoles',
        'availablePermissions',
        'permissions'
    ],
    components: {
        EmptyState,
        DialogModal,
        CustomPaginate,
        TeamMemberItem,
        InertiaLink,
        SearchIcon,
        SideNav,
        ConfirmationModal,
        AppLayout
    },

    data() {
        return {
            form: {
                search: '',
            },

            updateRoleForm: this.$inertia.form({
                role: null,
            }),

            leaveTeamForm: this.$inertia.form(),
            removeTeamMemberForm: this.$inertia.form(),

            currentlyManagingRole: false,
            managingRoleFor: null,
            confirmingLeavingTeam: false,
            teamMemberBeingRemoved: null,
        }
    },

    watch: {
        form: {
            deep: true,
            handler: throttle(function() {
                this.$inertia.get(route('user.teams.members', this.user.current_team), pickBy(this.form), { preserveState: true })
            }, 1000),
        },
    },

    methods: {
        manageRole(teamMember) {
            this.managingRoleFor = teamMember
            this.updateRoleForm.role = teamMember.membership.role
            this.currentlyManagingRole = true;
            this.showHideOverFlow(true);
        },

        updateRole() {
            this.updateRoleForm.put(route('team-members.update', [this.teamDetails, this.managingRoleFor]), {
                preserveScroll: true,
                onError: () => (this.errors()),
                onSuccess: () => {
                    this.currentlyManagingRole = false;
                    this.notification('updated');
                },
            })
        },

        confirmLeavingTeam() {
            this.confirmingLeavingTeam = true;
            this.showHideOverFlow(true);
        },

        leaveTeam() {
            this.leaveTeamForm.delete(route('team-members.destroy', [this.teamDetails, this.$page.props.user]), {
                onError: () => (this.errors()),
                onSuccess: () => (this.notification('leave from team')),
            })
        },

        confirmTeamMemberRemoval(teamMember) {
            this.teamMemberBeingRemoved = teamMember;
            this.showHideOverFlow(true);
        },

        removeTeamMember() {
            this.removeTeamMemberForm.delete(route('team-members.destroy', [this.teamDetails, this.teamMemberBeingRemoved]), {
                errorBag: 'removeTeamMember',
                preserveScroll: true,
                preserveState: true,
                onError: () => (this.errors()),
                onSuccess: () => {
                    this.teamMemberBeingRemoved = null;
                    this.notification('removed');
                },
            })
        },

        displayableRole(role) {
            return this.availableRoles.find(r => r.key === role).name
        },

        // Modal Close Methods
        closeManageRole() {
            this.currentlyManagingRole = false;
            this.showHideOverFlow(false);
        },

        closeLeavingTeam() {
            this.confirmingLeavingTeam = false;
            this.showHideOverFlow(false);
        },

        closeTeamMemberRemoval() {
            this.teamMemberBeingRemoved = null;
            this.showHideOverFlow(false);
        },

        notification(text) {
            this.$toast.success(`Team member was successfully ${text}!`);
        },

        errors() {
            this.$toast.error("OOPS! Something went wrong. Please try again!");
        },

        showHideOverFlow(show) {
            let main = document.querySelector('.main');
            if (main) {
                if (show) {
                    main.style.overflow = 'hidden';
                } else {
                    main.style.overflow = 'auto';
                }
            }
        },
    },
}
</script>

<style scoped>

</style>
