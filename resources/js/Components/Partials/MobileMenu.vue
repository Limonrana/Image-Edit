<template>
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="CarImageEdit-Mobile-Logo" class="w-6" :src="'/../../images/logo.svg'">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler" @click="handleMenu">
                <BarChart2Icon size="1.5x" class="w-8 h-8 text-white transform -rotate-90"></BarChart2Icon>
            </a>
        </div>
        <ul class="border-t border-theme-2 py-5" :class="!isOpenMenu ? 'hidden' : ''">
            <mobile-nav-link :href="route('user.dashboard')" :active="route().current('user.dashboard')">
                <template #icon><HomeIcon size="1.5x"></HomeIcon></template>
                <template #title>Dashboard</template>
            </mobile-nav-link>

            <mobile-nav-link :href="route('user.orders', { status: 'all' })" :active="route().current('user.orders')">
                <template #icon><shopping-bag-icon size="1.5x"></shopping-bag-icon></template>
                <template #title>My Orders</template>
            </mobile-nav-link>

            <mobile-nav-link :href="route('user.dashboard')" :active="route().current('user.create.order')">
                <template #icon><CreditCardIcon size="1.5x"></CreditCardIcon></template>
                <template #title>Create Order</template>
            </mobile-nav-link>

            <mobile-nav-link :href="route('user.quotations')" :active="route().current('user.quotations')">
                <template #icon><MessageSquareIcon size="1.5x"></MessageSquareIcon></template>
                <template #title>My Quotations</template>
            </mobile-nav-link>

            <li class="side-nav__devider my-6"></li>

            <mobile-nav-link :href="route('user.account.show')" :active="route().current('user.account.show')">
                <template #icon><UserIcon size="1.5x"></UserIcon></template>
                <template #title>Account</template>
            </mobile-nav-link>

            <mobile-nav-link :href="route('user.dashboard')" :active="route().current('chat')">
                <template #icon><HelpCircleIcon size="1.5x"></HelpCircleIcon></template>
                <template #title>Support</template>
            </mobile-nav-link>

            <li class="logout_menu">
                <form @submit.prevent="logout">
                    <button type="submit" class="menu w-full">
                        <div class="menu__icon"><toggle-right-icon size="1.5x" class="w-4 h-4 mr-2"></toggle-right-icon></div>
                        <div class="menu__title">Logout</div>
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <!-- END: Mobile Menu -->
</template>

<script>
import { BarChart2Icon, HomeIcon, ShoppingBagIcon, CreditCardIcon, MessageSquareIcon, HelpCircleIcon, UserIcon, ToggleRightIcon } from 'vue-feather-icons';
import MobileNavLink from "../NavLinks/MobileNavLink";
export default {
    name: "MobileMenu",
    props: ['logout'],
    components: {
        MobileNavLink,
        BarChart2Icon, HomeIcon, ShoppingBagIcon, CreditCardIcon, MessageSquareIcon, HelpCircleIcon, UserIcon, ToggleRightIcon},
    data() {
        return {
            isOpenMenu: false,
        }
    },
    methods: {
        handleMenu() {
            this.isOpenMenu = !this.isOpenMenu;
        }
    }
}
</script>

<style scoped>
    .logout_menu:hover {
        background: #102765 !important;
        border-radius: 10px;
    }
</style>
