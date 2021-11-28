<template>
    <authentication-card type="Login">
        <template #logo>
            <authentication-card-logo />
        </template>
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex justify-center items-center py-5 xl:py-0 my-10 xl:my-0">
            <form @submit.prevent="submit">
                <div class="my-auto mx-auto xl:bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Login to your account
                    </h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                    <validation-errors class="mb-4" />

                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>

                    <div class="intro-x mt-8">
                        <custom-input name="email" type="email" :value="form.name" @handle-input="inputHandler" placeholder="Email" required autofocus />
                        <custom-input name="password" type="password" class="mt-4" :value="form.password" @handle-input="inputHandler" placeholder="Password" required autocomplete="current-password" />
                    </div>
                    <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            <input-checkbox id="remember-me" name="remember" v-model:checked="form.remember" />
                            <label class="cursor-pointer select-none">Remember me</label>
                        </div>
                        <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Forgot your password?
                        </inertia-link>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <custom-button class="btn btn-primary xl:w-32" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Log in
                        </custom-button>
                        <inertia-link :href="route('register')" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
                            Sign up
                        </inertia-link>
                    </div>
                    <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                        By signin up, you agree to our
                        <br>
                        <a class="text-theme-17 dark:text-gray-300" href="">Terms and Conditions</a> & <a class="text-theme-17 dark:text-gray-300" href="">Privacy Policy</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- END: Login Form -->
    </authentication-card>
</template>

<script>
    import AuthenticationCard from '@/Components/Layouts/AuthenticationCard'
    import AuthenticationCardLogo from '@/Components/Common/AuthenticationCardLogo'
    import CustomButton from '@/Components/Buttons/Button'
    import CustomInput from '@/Components/Inputs/Input'
    import InputCheckbox from '@/Components/Inputs/Checkbox'
    import ValidationErrors from '@/Components/Common/ValidationErrors'
    import {InertiaLink} from "@inertiajs/inertia-vue";

    export default {
        components: {
            AuthenticationCard,
            AuthenticationCardLogo,
            CustomButton,
            CustomInput,
            InputCheckbox,
            ValidationErrors,
            InertiaLink
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            },
            inputHandler(value, name) {
                this.form = {...this.form, [name]: value};
            }
        }
    }
</script>
