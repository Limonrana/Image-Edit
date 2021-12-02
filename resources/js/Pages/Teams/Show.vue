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
                <!-- BEGIN: Profile Menu -->
                <side-nav :team="team"></side-nav>
                <!-- END: Profile Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <!-- BEGIN: Team Information -->
                    <update-team-name :team="team"></update-team-name>
                    <!-- END: Team Information -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>

<!--    <app-layout title="Team Settings">-->
<!--        <template #header>-->
<!--            <h2 class="font-semibold text-xl text-gray-800 leading-tight">-->
<!--                Team Settings-->
<!--            </h2>-->
<!--        </template>-->

<!--        <div>-->
<!--            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">-->
<!--                <update-team-name-form :team="team" :permissions="permissions" />-->

<!--                <team-member-manager class="mt-10 sm:mt-0"-->
<!--                            :team="team"-->
<!--                            :available-roles="availableRoles"-->
<!--                            :user-permissions="permissions" />-->

<!--                <template v-if="permissions.canDeleteTeam && ! team.personal_team">-->
<!--                    <jet-section-border />-->

<!--                    <delete-team-form class="mt-10 sm:mt-0" :team="team" />-->
<!--                </template>-->
<!--            </div>-->
<!--        </div>-->
<!--    </app-layout>-->
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DeleteTeamForm from '@/Pages/Teams/Partials/DeleteTeamForm.vue'
    import JetSectionBorder from '@/Components/Common/SectionBorder.vue'
    import TeamMemberManager from '@/Pages/Teams/Partials/TeamMemberManager.vue'
    import UpdateTeamNameForm from '@/Pages/Teams/Partials/UpdateTeamNameForm.vue'
    import SideNav from "@/Components/Team/SideNav";
    import UpdateTeamName from "../../Components/Team/UpdateTeamName";

    export default {
        props: [
            'user',
            'team',
            'availableRoles',
            'permissions',
        ],

        components: {
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
