<template>
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5">
            <div class="p-5">
                <p class="text-xs font-light text-gray-400 mb-3">Team Owner</p>
                <div class="relative flex items-center">
                    <div class="w-12 h-12 image-fit">
                        <img :alt="team.owner ? team.owner.name : user.name" class="rounded-full" :src="team.owner ? team.owner.profile_photo_url : user.profile_photo_url">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{ team.owner ? team.owner.name : user.name }}</div>
                        <div class="text-gray-600">{{ team.owner ? team.owner.email : user.email }}</div>
                    </div>
                </div>
            </div>

            <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
                <p class="text-xs font-light text-gray-400">Active Team</p>
                <div class="mt-1">
                    <div class="flex items-center">
                        <div><user-check-icon size="1.5x" class="w-4 h-4 mr-2"></user-check-icon> {{ user.current_team.name }}</div>
                    </div>
                </div>
            </div>

            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                <p class="text-xs font-light text-gray-400 mb-4">Manage Team</p>
                <side-nav-item :src="route('user.teams.show', $page.props.user.current_team)" title="Team Settings" :active="route().current('user.teams.show')">
                    <activity-icon size="1.5x" class="w-4 h-4 mr-2"></activity-icon>
                </side-nav-item>

                <side-nav-item :src="route('user.teams.create')" title="Create New Team" :active="route().current('user.teams.create')" classes="mt-5">
                    <plus-square-icon size="1.5x" class="w-4 h-4 mr-2"></plus-square-icon>
                </side-nav-item>

                <side-nav-item :src="route('user.teams.members', $page.props.user.current_team)" title="Team Members" :active="route().current('user.teams.members')" classes="mt-5">
                    <trello-icon size="1.5x" class="w-4 h-4 mr-2"></trello-icon>
                </side-nav-item>

                <side-nav-item :src="route('user.teams.members.create', $page.props.user.current_team)" title="Add Team Member" :active="route().current('user.teams.members.create')" classes="mt-5">
                    <user-plus-icon size="1.5x" class="w-4 h-4 mr-2"></user-plus-icon>
                </side-nav-item>
            </div>

            <div class="py-5 border-t border-gray-200 dark:border-dark-5">
                <p class="text-xs font-light text-gray-400 px-5 mb-2">Switch Teams</p>
                <div class="py-2 px-5 mb-1 switch-team" v-for="team in $page.props.user.all_teams" :key="team.id">
                    <form @submit.prevent="switchToTeam(team)">
                        <button type="submit" class="w-full text-left">
                            <div class="flex items-center">
                                <svg class="mr-2 h-5 w-5" :class="team.id === user.current_team_id ? 'text-green-400' : 'text-gray-400'" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div>{{ team.name }}</div>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ActivityIcon, UserPlusIcon, UserCheckIcon, TrelloIcon, PlusSquareIcon } from 'vue-feather-icons';
import SideNavItem from "./SideNavItem";

export default {
    name: "SideNav",
    props: ['team', 'user'],
    components: {SideNavItem, ActivityIcon, TrelloIcon, PlusSquareIcon, UserPlusIcon, UserCheckIcon},
    methods: {
        switchToTeam(team) {
            this.$inertia.put(route("user.current-team.update"), {team_id: team.id}, {
                    preserveState: false,
                    onError: () => (this.errors()),
                    onSuccess: () => (this.notification()),
                }
            );
        },

        notification() {
            this.$toast.success(`Team switch was successful!`);
        },

        errors() {
            if (this.form.hasErrors) {
                this.$toast.error("OOPS! Something went wrong. Please try again!");
            }
        }

    }
}
</script>

<style scoped>
    a.flex.items-center:hover {
        --tw-text-opacity: 1;
        color: rgba(20, 46, 113, var(--tw-text-opacity));
    }
    .switch-team:hover {
        background: #dfdfdfa1;
        border-radius: 5px;
    }
</style>
