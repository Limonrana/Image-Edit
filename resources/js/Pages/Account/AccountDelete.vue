<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="my-account">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Account Delete
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Profile Menu -->
                <side-nav :user="user"></side-nav>
                <!-- END: Profile Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <!-- BEGIN: Change Password -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Delete Account
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="max-w-xl text-sm text-gray-600">
                                Once your account is deleted, all of its resources and data will
                                be permanently deleted. Before deleting your account, please
                                download any data or information that you wish to retain.
                            </div>

                            <div class="flex items-center mt-5">
                                <button type="button" class="btn btn-danger" @click="confirmUserDeletion">
                                    Delete Account
                                </button>
                            </div>

                            <!-- Log Out Other Devices Confirmation Modal -->
                            <modal :show="confirmingUserDeletion" classes="account-delete-modal" @close="closeModal">
                                <template #title>
                                    Permanently delete your account.
                                </template>

                                <template #content>
                                    Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                                    <div class="mt-4" :class="form.errors.password ? 'has-error' : ''">
                                        <input type="password" class="form-control" placeholder="Password" ref="password"
                                               v-model="form.password"
                                               @keyup.enter="deleteUser" />

                                        <input-error :message="form.errors.password" class="mt-2" />
                                    </div>
                                </template>

                                <template #action>
                                    <button type="button" class="btn btn-danger" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Delete Account
                                    </button>
                                </template>
                            </modal>
                        </div>
                    </div>
                    <!-- END: Change Password -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import SideNav from "@/Components/Account/SideNav";
    import SimpleInput from "@/Components/Inputs/SimpleInput";
    import InputError from "@/Components/Inputs/InputError";
    import Modal from '@/Components/Modals/Modal';

    export default {
        name: 'AccountDelete',
        props: ['user'],
        components: {SimpleInput, InputError, SideNav, Modal, AppLayout},

        data() {
            return {
                confirmingUserDeletion: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            confirmUserDeletion() {
                this.confirmingUserDeletion = true;
                this.showHideOverFlow(true);
                setTimeout(() => this.$refs.password.focus(), 250)
            },

            deleteUser() {
                this.form.delete(route('current-user.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.confirmingUserDeletion = false
                this.showHideOverFlow(false);
                this.form.reset()
            },

            showHideOverFlow(show) {
                console.log('showHideOverFlow');
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
