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
                <side-nav :team="teamDetails" :user="user" />
                <!-- END: Team Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <!-- BEGIN: Team Information -->
                    <update-team-name :team="teamDetails" :permissions="permissions" />
                    <!-- END: Team Information -->

                    <!-- BEGIN: Team member-invitation -->
                    <template v-if="teamDetails.team_invitations.length > 0 && permissions.canAddTeamMembers">
                        <member-invitation :team="teamDetails" :permissions="permissions" />
                    </template>
                    <!-- END: Team member-invitation -->

                    <!-- BEGIN: Team Delete -->
                    <template v-if="permissions.canDeleteTeam && ! teamDetails.personal_team">
                        <delete-team :team="teamDetails" />
                    </template>
                    <!-- END: Team Delete -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import DeleteTeamForm from '@/Pages/Teams/Partials/DeleteTeamForm.vue';
    import SideNav from "@/Components/Team/SideNav";
    import UpdateTeamName from "../../Components/Team/UpdateTeamName";
    import DeleteTeam from "../../Components/Team/DeleteTeam";
    import MemberInvitation from "../../Components/Team/MemberInvitation";

    export default {
        props: ['user', 'teamDetails', 'permissions',],
        components: {MemberInvitation, AppLayout, DeleteTeamForm, UpdateTeamName, DeleteTeam, SideNav,},
    }
</script>
