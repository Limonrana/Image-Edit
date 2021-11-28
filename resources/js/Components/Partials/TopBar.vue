<template>
    <!-- BEGIN: Top Bar -->
    <div class="top-bar-boxed border-b border-theme-2 -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
        <div class="h-full flex items-center">
            <!-- BEGIN: Logo -->
            <a href="" class="-intro-x hidden md:flex">
                <img alt="CarImageEdit-logo" class="w-6" :src="'../../images/logo.svg'">
                <span class="text-white text-lg ml-3"> Ice<span class="font-medium">wall</span> </span>
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto">
                <a href="">Application</a><chevron-right-icon size="1.5x" class="breadcrumb__icon"></chevron-right-icon>
                <a href="" class="breadcrumb--active">{{ breadcrumb }}</a>
            </div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <search-box></search-box>
            <!-- END: Search -->
            <!-- BEGIN: Notifications -->
            <notifications-section :catch-click="catchOutsideClick"></notifications-section>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <account-menu :logout="logout" :catch-click="catchOutsideClick"></account-menu>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
</template>

<script>
import { ChevronRightIcon, SearchIcon } from 'vue-feather-icons';
import NotificationItem from "../Common/NotificationItem";
import AccountMenu from "../Topbar/AccountMenu";
import NotificationsSection from "../Topbar/NotificationsSection";
import SearchBox from "../Topbar/SearchBox";
export default {
    name: "TopBar",
    props: ['logout'],
    components: {SearchBox, NotificationsSection, AccountMenu, NotificationItem, ChevronRightIcon, SearchIcon},
    data() {
        return {

        }
    },
    computed: {
        breadcrumb() {
            let component = this.$page.component;
            let checkComponent = component.split('/');
            if (checkComponent) {
                return checkComponent[1] ? checkComponent[1] : checkComponent[0];
            }
        }
    },
    methods: {
        catchOutsideClick(event, dropdown, state)  {
            // When user clicks menu — do nothing
            if( dropdown === event.target || dropdown === event.target.parentNode ) {
                return false
            }
            // When user clicks outside of the menu — close the menu
            if( state && dropdown !== event.target ) {
                return true
            }
        }
    }
}
</script>

<style scoped>

</style>
