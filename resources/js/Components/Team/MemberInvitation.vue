<template>
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Pending Team Invitations
            </h2>
        </div>
        <div class="p-5">
            <p>These people have been invited to your team and have been sent an invitation email. They may join the team by accepting the email invitation.</p>
            <div class="mt-5">
                <div class="flex items-center justify-between mb-3 pending-invite" v-for="invitation in team.team_invitations" :key="invitation.id">
                    <div class="text-black font-medium text-sm">{{ invitation.email }}</div>
                    <div class="flex items-center">
                        <!-- Cancel Team Invitation -->
                        <button class="invite-btn w-auto" @click="cancelTeamInvitation(invitation)" v-if="permissions.canRemoveTeamMembers">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MemberInvitation",
    props: ['team', 'permissions'],

    methods: {
        cancelTeamInvitation(invitation) {
            this.$inertia.delete(route('user.team-invitations.destroy', invitation), {
                preserveScroll: true,
                onError: () => (this.errors()),
                onSuccess: () => (this.notification()),
            });
        },

        notification() {
            this.$toast.success(`Team member invitation was successfully cancelled!`);
        },

        errors() {
            this.$toast.error("OOPS! Something went wrong. Please try again!");
        }
    }
}
</script>

<style scoped>
    .pending-invite {
        border-radius: 5px;
        background: #efefef;
        padding: 10px;
        color: #222 !important;
    }
    .invite-btn {
        color: red;
        text-decoration: underline;
    }
</style>
