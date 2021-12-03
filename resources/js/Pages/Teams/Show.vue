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
                <side-nav :team="team"></side-nav>
                <!-- END: Team Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <!-- BEGIN: Team Information -->
                    <update-team-name :team="team"></update-team-name>
                    <!-- END: Team Information -->

                    <!-- BEGIN: Team Delete -->
                    <template v-if="permissions.canDeleteTeam && ! team.personal_team">
                        <delete-team :team="team"></delete-team>
                    </template>
                    <!-- END: Team Delete -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DeleteTeamForm from '@/Pages/Teams/Partials/DeleteTeamForm.vue'
    import JetSectionBorder from '@/Components/Common/SectionBorder.vue'
    import TeamMemberManager from '@/Pages/Teams/Partials/TeamMemberManager.vue'
    import UpdateTeamNameForm from '@/Pages/Teams/Partials/UpdateTeamNameForm.vue'
    import SideNav from "@/Components/Team/SideNav";
    import UpdateTeamName from "../../Components/Team/UpdateTeamName";
    import DeleteTeam from "../../Components/Team/DeleteTeam";

    export default {
        props: [
            'user',
            'team',
            'availableRoles',
            'permissions',
        ],

        components: {
            DeleteTeam,
            UpdateTeamName,
            AppLayout,
            DeleteTeamForm,
            JetSectionBorder,
            TeamMemberManager,
            UpdateTeamNameForm,
            SideNav,
        },

        mounted() {
            console.log(this.team);
            console.log(this.user);
        },
    }
</script>
