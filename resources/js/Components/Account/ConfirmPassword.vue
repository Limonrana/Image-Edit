<template>
    <span>
        <span @click="startConfirmingPassword">
            <slot />
        </span>
        <modal :show="confirmingPassword" classes="account-security-modal" @close="closeModal">
            <template #title>
                <h2 class="font-medium text-base mr-auto">Confirm Password</h2>
            </template>

            <template #content>
                <p>For your security, please confirm your password to continue.</p>
                <div class="mt-4" :class="form.error ? 'has-error' : ''">
                    <input type="password" class="form-control" placeholder="Password"
                               ref="password"
                               v-model="form.password"
                               @keyup.enter="confirmPassword" />
                    <input-error :message="form.error" class="mt-2" />
                </div>
            </template>

            <template #action>
                <button type="button" class="btn btn-primary w-20" @click="confirmPassword" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </button>
            </template>
        </modal>
    </span>
</template>

<script>
import Modal from '../Modals/Modal';
import SimpleInput from "../Inputs/SimpleInput";
import InputError from "../Inputs/InputError";

export default {
    name: "ConfirmPassword",
    components: {Modal, SimpleInput, InputError},
    data() {
        return {
            confirmingPassword: false,
            form: {
                password: '',
                error: '',
            },
        }
    },

    methods: {
        startConfirmingPassword() {
            axios.get(route('password.confirmation')).then(response => {
                if (response.data.confirmed) {
                    this.$emit('confirmed');
                } else {
                    this.confirmingPassword = true;
                    this.showHideOverFlow(true);
                    setTimeout(() => this.$refs.password.focus(), 250)
                }
            })
        },

        confirmPassword() {
            this.form.processing = true;

            axios.post(route('password.confirm'), {
                password: this.form.password,
            }).then(() => {
                this.form.processing = false;
                this.closeModal()
                this.$nextTick(() => this.$emit('confirmed'));
            }).catch(error => {
                this.form.processing = false;
                this.form.error = error.response.data.errors.password[0];
                this.$refs.password.focus()
            });
        },

        closeModal() {
            this.confirmingPassword = false
            this.form.password = '';
            this.form.error = '';
            this.showHideOverFlow(false);
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
    }
}
</script>

<style scoped>

</style>
