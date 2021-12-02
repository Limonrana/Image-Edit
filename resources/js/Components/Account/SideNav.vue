<template>
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5">
            <div class="relative flex items-center p-5">
                <div class="w-12 h-12 image-fit">
                    <img :alt="user.name" class="rounded-full" :src="user.profile_photo_url">
                </div>
                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">{{ user.name }}</div>
                    <div class="text-gray-600">{{ user.email }}</div>
                </div>
            </div>
            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                <side-nav-item :src="route('user.account.show')" title="Personal Information" :active="route().current('user.account.show')">
                    <activity-icon size="1.5x" class="w-4 h-4 mr-2"></activity-icon>
                </side-nav-item>

                <side-nav-item :src="route('user.account.address')" title="Address Information" :active="route().current('user.account.address')" classes="mt-5">
                    <trello-icon size="1.5x" class="w-4 h-4 mr-2"></trello-icon>
                </side-nav-item>

                <side-nav-item :src="route('user.account.change.password')" title="Change Password" :active="route().current('user.account.change.password')" classes="mt-5">
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
            <div class="p-5 border-t border-gray-200 dark:border-dark-5 flex">
                <inertia-link :href="route('user.profile.show')" class="btn btn-primary py-1 px-2">View Profile</inertia-link>
                <inertia-link :href="route('user.orders', { status: 'all'})" class="btn btn-outline-secondary py-1 px-2 ml-auto">My Orders</inertia-link>
            </div>
        </div>
    </div>
</template>

<script>
import { LockIcon, ActivityIcon, SettingsIcon, ShieldOffIcon, GlobeIcon, XSquareIcon, TrelloIcon } from 'vue-feather-icons';
import SideNavItem from "./SideNavItem";
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "SideNav",
    props: ['user'],
    components: {InertiaLink, SideNavItem, LockIcon, ActivityIcon, SettingsIcon, TrelloIcon, ShieldOffIcon, GlobeIcon, XSquareIcon}
}
</script>

<style scoped>

</style>
