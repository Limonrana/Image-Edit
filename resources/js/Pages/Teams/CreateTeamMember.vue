<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="team-members">
            <h2 class="intro-y text-lg font-medium mt-10">
               Create Team Members
            </h2>

            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Team Menu -->
                <side-nav :team="teamDetails" :user="user"></side-nav>
                <!-- END: Team Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Add New Team Member
                        </h2>
                    </div>
                    <div class="p-5">
                        <form @submit.prevent="addTeamMember">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12">
                                    <div class="max-w-xl text-sm text-gray-600">
                                        Please provide the email address of the person you would like to add to this team.
                                    </div>
                                </div>
                                <div class="col-span-12 mt-4">
                                    <div :class="{'has-error' : addTeamMemberForm.errors.email}">
                                        <custom-label>Email Address</custom-label>
                                        <simple-input name="email" type="email" :value="addTeamMemberForm.email" @handle-input="inputHandler" placeholder="Email address" />
                                        <input-error :message="addTeamMemberForm.errors.email" />
                                    </div>
                                </div>

                                <!-- Role -->
                                <div class="col-span-12 mt-4" v-if="availableRoles.length > 0">
                                    <custom-label>Role</custom-label>
                                    <input-error :message="addTeamMemberForm.errors.role" class="mt-2" />

                                    <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                                        <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                                                :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(availableRoles).length - 1}"
                                                @click="addTeamMemberForm.role = role.key"
                                                v-for="(role, i) in availableRoles"
                                                :key="role.key">
                                            <div :class="{'opacity-50': addTeamMemberForm.role && addTeamMemberForm.role != role.key}">
                                                <!-- Role Name -->
                                                <div class="flex items-center">
                                                    <div class="text-sm text-gray-600" :class="{'font-semibold': addTeamMemberForm.role == role.key}">
                                                        {{ role.name }}
                                                    </div>

                                                    <svg v-if="addTeamMemberForm.role == role.key" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </div>

                                                <!-- Role Description -->
                                                <div class="mt-2 text-xs text-gray-600 text-left">
                                                    {{ role.description }}
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end mt-5">
                                <button type="submit" class="btn btn-primary w-20 mr-auto" :class="{ 'opacity-25': addTeamMemberForm.processing }" :disabled="addTeamMemberForm.processing">ADD</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        <!-- END: Content -->
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import {InertiaLink} from "@inertiajs/inertia-vue";
import { SearchIcon } from 'vue-feather-icons';
import SideNav from "@/Components/Team/SideNav";
import CustomLabel from '@/Components/Inputs/Label';
import SimpleInput from "@/Components/Inputs/SimpleInput";
import InputError from "@/Components/Inputs/InputError";

export default {
    name: "CreateTeamMember",
    props: ['user', 'teamDetails', 'availableRoles'],
    components: {InputError, SimpleInput, CustomLabel, InertiaLink, SearchIcon, SideNav, AppLayout},

    data() {
        return {
            addTeamMemberForm: this.$inertia.form({
                email: '',
                role: null,
            })
        }
    },

    methods: {
        addTeamMember() {
            this.addTeamMemberForm.post(route('user.team.members.store', this.teamDetails.id), {
                errorBag: 'addTeamMember',
                preserveScroll: true,
                onError: () => (this.errors()),
                onSuccess: () => {
                    this.addTeamMemberForm.reset();
                    this.notification();
                },
            });
        },

        inputHandler(value, name) {
            this.addTeamMemberForm = {...this.addTeamMemberForm, [name]: value};
        },

        notification() {
            this.$toast.success(`Team member invitation was successfully send!`);
        },

        errors() {
            if (this.form.hasErrors) {
                this.$toast.error("OOPS! Something went wrong. Please try again!");
            }
        }

    },
}
</script>

<style scoped>

</style>
