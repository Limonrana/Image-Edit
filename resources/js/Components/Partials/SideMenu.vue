<template>
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <ul>
            <NavLink :href="route('user.dashboard')" :active="route().current('user.dashboard')">
                <template #icon><HomeIcon size="1.5x"></HomeIcon></template>
                <template #title>Dashboard</template>
            </NavLink>

            <NavLink :href="route('user.orders', { status: 'all' })" :active="route().current('user.orders')">
                <template #icon><shopping-bag-icon size="1.5x"></shopping-bag-icon></template>
                <template #title>My Orders</template>
            </NavLink>

            <NavLink :href="route('user.orders.create')" :active="route().current('user.orders.create')">
                <template #icon><CreditCardIcon size="1.5x"></CreditCardIcon></template>
                <template #title>Create Order</template>
            </NavLink>

            <NavLink :href="route('user.quotations')" :active="route().current('user.quotations')">
                <template #icon><MessageSquareIcon size="1.5x"></MessageSquareIcon></template>
                <template #title>My Quotations</template>
            </NavLink>

            <NavLink :href="route('user.invoices')" :active="route().current('user.invoices')">
                <template #icon><DollarSignIcon size="1.5x"></DollarSignIcon></template>
                <template #title>My Invoices</template>
            </NavLink>

            <NavLink :href="route('user.files', { status: 'all' })" :active="route().current('user.files')">
                <template #icon><HardDriveIcon size="1.5x"></HardDriveIcon></template>
                <template #title>File Manager</template>
            </NavLink>

            <li class="side-nav__devider my-6"></li>

            <NavLink :href="route('user.profile.show')" :active="route().current('user.profile.show')">
                <template #icon><TrelloIcon size="1.5x"></TrelloIcon></template>
                <template #title>Profile</template>
            </NavLink>

            <NavLink :href="route('user.account.show')" :active="route().current('user.account.show')"
                     :url="['address', 'change-password', 'security', 'sessions', 'delete']">
                <template #icon><UserIcon size="1.5x"></UserIcon></template>
                <template #title>Account</template>
            </NavLink>

            <NavLink :href="route('user.teams.show', $page.props.user.current_team)"
                     :active="route().current('user.teams.show')" path="teams"
                     :url="['create', `${$page.props.user.current_team_id}/members`,
                     `${$page.props.user.current_team_id}/members/create`]">
                <template #icon><UsersIcon size="1.5x"></UsersIcon></template>
                <template #title>Manage Team</template>
            </NavLink>

            <NavLink :href="route('user.support.show')" :active="route().current('user.support.show')">
                <template #icon><HelpCircleIcon size="1.5x"></HelpCircleIcon></template>
                <template #title>Support</template>
            </NavLink>

            <li class="logout_menu">
                <form @submit.prevent="logout">
                    <button type="submit" class="side-menu w-full">
                        <div class="side-menu__icon"><toggle-right-icon size="1.5x" class="w-4 h-4 mr-2"></toggle-right-icon></div>
                        <div class="side-menu__title">Logout</div>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- END: Side Menu -->
</template>

<script>
import NavLink from "../NavLinks/NavLink";
import { HomeIcon, ShoppingBagIcon, CreditCardIcon, MessageSquareIcon, HelpCircleIcon, UserIcon, ToggleRightIcon, DollarSignIcon, TrelloIcon, UsersIcon, HardDriveIcon } from 'vue-feather-icons';
export default {
    name: "SideMenu",
    props: ['logout'],
    components: {NavLink, HomeIcon, ShoppingBagIcon, CreditCardIcon, MessageSquareIcon, HelpCircleIcon, UserIcon, ToggleRightIcon, DollarSignIcon, TrelloIcon, UsersIcon, HardDriveIcon}
}
</script>

<style scoped>
    .logout_menu:hover {
        background: #102765 !important;
        border-radius: 10px;
    }
</style>
