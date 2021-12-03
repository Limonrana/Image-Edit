<template>
    <!-- BEGIN: Change Password -->
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Delete Team
            </h2>
        </div>
        <div class="p-5">
            <div class="max-w-xl text-sm text-gray-600">
                Once a team is deleted, all of its resources and data will be permanently deleted. Before deleting this team, please download any data or information regarding this team that you wish to retain.
            </div>

            <div class="flex items-center mt-5">
                <button type="button" class="btn btn-danger" @click="confirmTeamDeletion">
                    Delete Team
                </button>
            </div>

            <!-- Team Delete Confirmation Modal -->
            <modal :show="confirmingTeamDeletion" classes="account-delete-modal" @close="closeModal">
                <template #title>
                    Permanently delete.
                </template>

                <template #content>
                    Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted.
                </template>

                <template #action>
                    <button type="button" class="btn btn-danger" @click="deleteTeam" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete Team
                    </button>
                </template>
            </modal>
        </div>
    </div>
    <!-- END: Change Password -->
</template>

<script>
import SimpleInput from "@/Components/Inputs/SimpleInput";
import InputError from "@/Components/Inputs/InputError";
import Modal from '@/Components/Modals/Modal';
import ConfirmationModal from "../Modals/ConfirmationModal";
import DangerButton from "../Buttons/DangerButton";
import SecondaryButton from "../Buttons/SecondaryButton";

export default {
    name: "DeleteTeam",
    props: ['team'],
    components: {SecondaryButton, DangerButton, ConfirmationModal, SimpleInput, InputError, Modal},
    data() {
        return {
            confirmingTeamDeletion: false,
            deleting: false,

            form: this.$inertia.form()
        }
    },
    methods: {
        confirmTeamDeletion() {
            this.confirmingTeamDeletion = true;
            this.showHideOverFlow(true);
        },

        deleteTeam() {
            this.form.delete(route('teams.destroy', this.team), {
                errorBag: 'deleteTeam'
            });
        },

        closeModal() {
            this.confirmingTeamDeletion = false
            this.showHideOverFlow(false);
            this.form.reset()
        },

        showHideOverFlow(show) {
            let main = document.querySelector('.main');
            if (main) {
                if (show) {
                    main.style.overflow = 'hidden';
                } else {
                    main.style.overflow = 'auto';
                }
            }
        }
    },
}
</script>

<style scoped>

</style>
