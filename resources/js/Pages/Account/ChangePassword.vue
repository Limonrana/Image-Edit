<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="my-account">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Update Password
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
                                Change Password
                            </h2>
                        </div>
                        <div class="p-5">
                            <form @submit.prevent="updatePassword">
                                <div :class="form.errors.current_password ? 'has-error' : ''">
                                    <custom-label>Current Password</custom-label>
                                    <simple-input name="current_password" type="password" :value="form.current_password" @handle-input="inputHandler" placeholder="Current Password" ref="current_password" autocomplete="current-password" required />
                                    <input-error :message="form.errors.current_password" />
                                </div>
                                <div :class="form.errors.password ? 'has-error mt-3' : 'mt-3'">
                                    <custom-label>New Password</custom-label>
                                    <simple-input name="password" type="password" :value="form.password" @handle-input="inputHandler" placeholder="New Password" ref="password" autocomplete="new-password" required />
                                    <input-error :message="form.errors.password" />
                                </div>

                                <div :class="form.errors.password_confirmation ? 'has-error mt-3' : 'mt-3'">
                                    <custom-label>Confirm Password</custom-label>
                                    <simple-input name="password_confirmation" type="password" :value="form.password_confirmation" @handle-input="inputHandler" placeholder="Confirm Password" autocomplete="new-password" required />
                                    <input-error :message="form.errors.password_confirmation" />
                                </div>
                                <primary-button class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Change Password
                                </primary-button>
                            </form>
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
import CustomLabel from '@/Components/Inputs/Label';
import SimpleInput from "@/Components/Inputs/SimpleInput";
import InputError from "@/Components/Inputs/InputError";
import PrimaryButton from "../../Components/Buttons/PrimaryButton";

export default {
    name: "ChangePassword",
    props: ['user'],
    components: {PrimaryButton, CustomLabel, SimpleInput, InputError, SideNav, AppLayout},
    data() {
        return {
            form: this.$inertia.form({
                password: '',
                current_password: '',
                password_confirmation: '',
            }),
        }
    },
    methods: {
        updatePassword() {
            this.form.put(route('user-password.update'), {
                errorBag: 'updatePassword',
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                    this.notification('updated')
                },
                onError: () => {
                    if (this.form.errors.password) {
                        this.form.reset('password', 'password_confirmation');
                        this.$refs.password.focus();
                    }

                    if (this.form.errors.current_password) {
                        this.form.reset('current_password');
                        this.$refs.current_password.focus();
                    }

                    this.errors();
                }
            });
        },

        inputHandler(value, name) {
            this.form = {...this.form, [name]: value};
        },

        notification(text) {
            this.$toast.success(`Password was ${text} successfully!`);
        },

        errors() {
            if (this.form.hasErrors) {
                this.$toast.error("OOPS! Something went wrong. Please try again!");
            }
        }
    }
}
</script>

<style scoped>

</style>
