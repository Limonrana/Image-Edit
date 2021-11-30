<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="my-account">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Account Security
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
                                Two Factor Authentication
                            </h2>
                        </div>
                        <div class="p-5">
                            <h3 class="text-base font-medium text-gray-900" v-if="twoFactorEnabled">
                                You have enabled two factor authentication.
                            </h3>
                            <h3 class="text-base font-medium text-gray-900" v-else>
                                You have not enabled two factor authentication.
                            </h3>
                            <div class="mt-3 max-w-xl text-sm text-gray-600">
                                <p>
                                    When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.
                                </p>
                            </div>
                            <!-- QR Code & Recover Code Section Start -->
                            <div v-if="twoFactorEnabled">
                                <div v-if="qrCode">
                                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                                        <p class="font-semibold">
                                            Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application.
                                        </p>
                                    </div>

                                    <div class="mt-4" v-html="qrCode">
                                    </div>
                                </div>

                                <div v-if="recoveryCodes.length > 0">
                                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                                        <p class="font-semibold">
                                            Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.
                                        </p>
                                    </div>

                                    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                                        <div v-for="code in recoveryCodes" :key="code">
                                            {{ code }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- QR Code & Recover Code Section End -->
                            <div v-if="! twoFactorEnabled">
                                <confirm-password @confirmed="enableTwoFactorAuthentication">
                                    <button class="btn btn-primary mt-5" type="button">
                                        Enable
                                    </button>
                                </confirm-password>
                            </div>

                            <div class="mt-5" v-else>
                                <confirm-password @confirmed="regenerateRecoveryCodes">
                                    <button class="btn btn-secondary mr-3" v-if="recoveryCodes.length > 0">
                                        Regenerate Recovery Codes
                                    </button>
                                </confirm-password>

                                <confirm-password @confirmed="showRecoveryCodes">
                                    <button class="btn btn-dark mr-3" v-if="recoveryCodes.length === 0">
                                        Show Recovery Codes
                                    </button>
                                </confirm-password>

                                <confirm-password @confirmed="disableTwoFactorAuthentication">
                                    <button class="btn btn-danger" :class="{ 'opacity-25': disabling }" :disabled="disabling">
                                        Disable
                                    </button>
                                </confirm-password>

                            </div>
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
import SideNav from "@/Components/Profile/SideNav";
import CustomLabel from '@/Components/Inputs/Label';
import SimpleInput from "@/Components/Inputs/SimpleInput";
import InputError from "@/Components/Inputs/InputError";
import ConfirmPassword from '@/Components/Profile/ConfirmPassword';

export default {
    name: "AccountSecurity",
    props: ['user'],
    components: {CustomLabel, SimpleInput, InputError, SideNav, AppLayout, ConfirmPassword},
    data() {
        return {
            enabling: false,
            disabling: false,

            qrCode: null,
            recoveryCodes: [],
        }
    },

    methods: {
       enableTwoFactorAuthentication() {
            this.enabling = true
            this.$inertia.post('/user/two-factor-authentication', {}, {
                preserveScroll: true,
                onSuccess: () => Promise.all([
                    this.showQrCode(),
                    this.showRecoveryCodes(),
                ]),
                onFinish: () => (this.enabling = false),
            })
        },

        showQrCode() {
            return axios.get('/user/two-factor-qr-code')
                .then(response => {
                    this.qrCode = response.data.svg
                })
        },

        showRecoveryCodes() {
            return axios.get('/user/two-factor-recovery-codes')
                .then(response => {
                    this.recoveryCodes = response.data
                })
        },

        regenerateRecoveryCodes() {
            axios.post('/user/two-factor-recovery-codes')
                .then(response => {
                    this.showRecoveryCodes()
                })
        },

        disableTwoFactorAuthentication() {
            this.disabling = true

            this.$inertia.delete('/user/two-factor-authentication', {
                preserveScroll: true,
                onSuccess: () => (this.disabling = false),
            })
        },
    },

    computed: {
        twoFactorEnabled() {
            return ! this.enabling && this.$page.props.user.two_factor_enabled
        }
    }
}
</script>

<style scoped>

</style>
