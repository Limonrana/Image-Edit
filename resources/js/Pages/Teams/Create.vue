<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="my-account">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Manage Team
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Team Menu -->
                <side-nav :team="user" :user="user"></side-nav>
                <!-- END: Team Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <!-- BEGIN: Create Team -->
                    <create-team></create-team>
                    <!-- END: Create Team -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import SideNav from "@/Components/Team/SideNav";
import CreateTeam from "../../Components/Team/CreateTeam";

    export default {
        name: "Create",
        props: ['user'],
        components: {CreateTeam, AppLayout, SideNav},
    }
</script>
