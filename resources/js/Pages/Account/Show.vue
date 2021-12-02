<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="my-account">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Update Account
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Profile Menu -->
                <side-nav :user="user"></side-nav>
                <!-- END: Profile Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <!-- BEGIN: Personal Information -->
                    <profile-information :user="user"></profile-information>
                    <!-- END: Personal Information -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import SideNav from "@/Components/Account/SideNav";
    import ProfileInformation from "@/Components/Account/ProfileInformation";

    export default {
        props: ['sessions', 'user'],

        components: { ProfileInformation, SideNav, AppLayout },
        data() {
            return {

            }
        },
        methods: {

        }
    }
</script>
