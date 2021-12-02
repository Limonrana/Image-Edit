<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="my-account">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Sessions List
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
                            <h2 class="font-medium text-lg mr-auto">
                                Browser Sessions
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="max-w-xl text-sm text-gray-600">
                                If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.
                            </div>

                            <!-- Other Browser Sessions -->
                            <div class="mt-5 space-y-6" v-if="sessions.length > 0">
                                <div class="flex items-center mt-5" v-for="(session, i) in sessions" :key="i">
                                    <div>
                                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500" v-if="session.agent.is_desktop">
                                            <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500" v-else>
                                            <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                        </svg>
                                    </div>

                                    <div class="ml-3">
                                        <div class="font-medium text-gray-600">
                                            {{ session.agent.platform }} - {{ session.agent.browser }}
                                        </div>

                                        <div>
                                            <div class="text-xs text-gray-500">
                                                {{ session.ip_address }},

                                                <span class="text-green-500 font-semibold" v-if="session.is_current_device">This device</span>
                                                <span v-else>Last active {{ session.last_active }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center mt-5">
                                <button type="button" class="btn btn-primary" @click="confirmLogout">
                                    Log Out Other Browser Sessions
                                </button>
                            </div>

                            <!-- Log Out Other Devices Confirmation Modal -->
                            <modal :show="confirmingLogout" classes="account-session-modal" @close="closeModal">
                                <template #title>
                                    Log Out Other Browser Sessions
                                </template>

                                <template #content>
                                    Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.

                                    <div class="mt-4" :class="form.errors.password ? 'has-error' : ''">
                                        <input type="password" class="form-control" placeholder="Password" ref="password"
                                                   v-model="form.password"
                                                   @keyup.enter="logoutOtherBrowserSessions" />

                                        <input-error :message="form.errors.password" class="mt-2" />
                                    </div>
                                </template>

                                <template #action>
                                    <button type="button" class="btn btn-primary" @click="logoutOtherBrowserSessions" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Log Out Other Browser Sessions
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
import CustomLabel from '@/Components/Inputs/Label';
import SimpleInput from "@/Components/Inputs/SimpleInput";
import InputError from "@/Components/Inputs/InputError";
import Modal from '@/Components/Modals/Modal';

export default {
    name: "BrowserSessions",
    props: ['user', 'sessions'],
    components: {CustomLabel, SimpleInput, InputError, SideNav, AppLayout, Modal},
    data() {
        return {
            confirmingLogout: false,
            form: this.$inertia.form({
                password: '',
            })
        }
    },

    methods: {
        confirmLogout() {
            this.confirmingLogout = true;
            this.showHideOverFlow(true);
            setTimeout(() => this.$refs.password.focus(), 250);
        },

        logoutOtherBrowserSessions() {
            this.form.delete(route('other-browser-sessions.destroy'), {
                preserveScroll: true,
                onSuccess: () => this.closeModal(),
                onError: () => this.$refs.password.focus(),
                onFinish: () => this.form.reset(),
            });
        },

        closeModal() {
            this.confirmingLogout = false;
            this.showHideOverFlow(false);
            this.form.reset();
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

<style scoped>
    .text-green-500 {
        --tw-text-opacity: 1;
        color: rgba(16, 185, 129, var(--tw-text-opacity));
    }
</style>
