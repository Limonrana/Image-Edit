<template>
    <authentication-card>
        <template #logo>
            <authentication-card-logo />
        </template>

        <validation-errors class="mb-4" />

        <!-- BEGIN: RestPassword Form -->
        <div class="h-screen xl:h-auto flex justify-center items-center py-5 px-10 mx-6 xl:py-0 my-10 xl:my-0">
            <form @submit.prevent="submit">
                <div class="my-auto mx-auto xl:bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Reset your password
                    </h2>
                    <div class="intro-x mt-8">
                        <custom-input id="email" type="email" placeholder="Email" v-model="form.email" required autofocus />
                        <custom-input id="password" type="password" placeholder="Password" v-model="form.password" required autocomplete="new-password" />
                        <custom-input id="password_confirmation" type="password" placeholder="Confirm Password" v-model="form.password_confirmation" required autocomplete="new-password" />
                    </div>
                    <div class="intro-x mt-5 xl:mt-6 text-center xl:text-left">
                        <custom-button class="btn btn-primary w-max" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Email Password Reset Link
                        </custom-button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END: RestPassword Form -->
    </authentication-card>
</template>

<script>
    import AuthenticationCard from '@/Components/Layouts/AuthenticationCard'
    import AuthenticationCardLogo from '@/Components/Common/AuthenticationCardLogo'
    import CustomButton from '@/Components/Buttons/Button'
    import CustomInput from '@/Components/Inputs/Input'
    import ValidationErrors from '@/Components/Common/ValidationErrors'

    export default {
        components: {
            AuthenticationCard,
            AuthenticationCardLogo,
            CustomButton,
            CustomInput,
            ValidationErrors
        },

        props: {
            email: String,
            token: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    token: this.token,
                    email: this.email,
                    password: '',
                    password_confirmation: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.update'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
