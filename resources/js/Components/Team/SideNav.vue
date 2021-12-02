<template>
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5">
            <div class="relative flex items-center p-5">
                <div class="w-12 h-12 image-fit">
                    <img :alt="team.owner.name" class="rounded-full" :src="team.owner.profile_photo_url">
                </div>
                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">{{ team.owner.name }}</div>
                    <div class="text-gray-600">{{ team.owner.email }}</div>
                </div>
            </div>
            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                <side-nav-item :src="route('user.teams.show', $page.props.user.current_team)" title="Team Owner" :active="route().current('user.teams.show')">
                    <activity-icon size="1.5x" class="w-4 h-4 mr-2"></activity-icon>
                </side-nav-item>

                <side-nav-item :src="route('user.teams.show', $page.props.user.current_team)" title="Create New Team" :active="route().current('user.teams.create')" classes="mt-5">
                    <trello-icon size="1.5x" class="w-4 h-4 mr-2"></trello-icon>
                </side-nav-item>

                <side-nav-item :src="route('user.account.change.password')" title="Add Team Member" :active="route().current('user.teams.member.create')" classes="mt-5">
                    <lock-icon size="1.5x" class="w-4 h-4 mr-2"></lock-icon>
                </side-nav-item>
            </div>
            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                <side-nav-item :src="route('user.account.security')" title="Account Security" :active="route().current('user.account.security')">
                    <shield-off-icon size="1.5x" class="w-4 h-4 mr-2"></shield-off-icon>
                </side-nav-item>

                <side-nav-item :src="route('user.account.sessions')" title="Browser Sessions" :active="route().current('user.account.sessions')" classes="mt-5">
                    <globe-icon size="1.5x" class="w-4 h-4 mr-2"></globe-icon>
                </side-nav-item>

                <side-nav-item :src="route('user.account.delete')" title="Delete Account" :active="route().current('user.account.delete')" classes="mt-5">
                    <x-square-icon size="1.5x" class="w-4 h-4 mr-2"></x-square-icon>
                </side-nav-item>
            </div>
        </div>
    </div>
</template>

<script>
import { LockIcon, ActivityIcon, SettingsIcon, ShieldOffIcon, GlobeIcon, XSquareIcon, TrelloIcon } from 'vue-feather-icons';
import SideNavItem from "./SideNavItem";

export default {
    name: "SideNav",
    props: ['team'],
    components: {SideNavItem, LockIcon, ActivityIcon, SettingsIcon, TrelloIcon, ShieldOffIcon, GlobeIcon, XSquareIcon}
}
</script>

<style scoped>

</style>
