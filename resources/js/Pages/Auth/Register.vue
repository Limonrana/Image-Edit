<template>
    <custom-authentication-card type="Register">
        <template #logo>
            <custom-authentication-card-logo />
        </template>

        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex justify-center items-center py-5 xl:py-0 my-10 xl:my-0">
            <form @submit.prevent="submit">
                <div class="my-auto mx-auto xl:bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Create your account
                    </h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to create your account. Manage all your accounts in one place</div>

                    <custom-validation-errors class="mb-4" />

                    <div class="intro-x mt-8">
                        <custom-input id="name" name="name" type="text" class="mt-1 block w-full" :value="form.name" @handle-input="inputHandler" required autofocus autocomplete="name" placeholder="Full Name" />
                        <custom-input id="email" name="email" type="email" class="mt-1 block w-full" :value="form.email" @handle-input="inputHandler" required placeholder="Email Address" />
                        <custom-input id="phone" name="phone" type="number" class="mt-1 block w-full" :value="form.phone" @handle-input="inputHandler" required placeholder="Phone Number" />
                        <custom-input id="password" name="password" type="password" class="mt-1 block w-full" :value="form.password" @handle-input="inputHandler" required autocomplete="new-password" placeholder="Password" />
                        <password-secure-label :label="passLabel" />
                        <custom-input id="password_confirmation" name="password_confirmation" type="password" class="mt-4 block w-full" :value="form.password_confirmation" @handle-input="inputHandler" required autocomplete="new-password" placeholder="Confirm Password" />
                    </div>

                    <div class="intro-x flex items-center text-gray-700 dark:text-gray-600 mt-4 text-xs sm:text-sm">
                        <input-checkbox name="terms" id="terms" inputValue="terms" v-model="form.terms" />
                        <label class="cursor-pointer select-none" for="terms">I agree to the</label>
                        <a class="text-theme-17 dark:text-gray-300 ml-1" target="_blank" :href="route('terms.show')">Terms of Service </a>
                        <label class="cursor-pointer select-none" for="terms">&nbsp;and</label>
                        <a class="text-theme-17 dark:text-gray-300 ml-1" target="_blank" :href="route('policy.show')">Privacy Policy</a>.
                    </div>

                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <custom-button class="btn btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Register
                        </custom-button>
                        <inertia-link :href="route('login')" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
                            Login
                        </inertia-link>
                    </div>
                </div>
            </form>
        </div>
        <!-- END: Login Form -->
    </custom-authentication-card>
</template>

<script>
    import CustomAuthenticationCard from '@/Components/Layouts/AuthenticationCard'
    import CustomAuthenticationCardLogo from '@/Components/Common/AuthenticationCardLogo'
    import CustomButton from '@/Components/Buttons/Button'
    import CustomInput from '@/Components/Inputs/Input'
    import InputCheckbox from "@/Components/Inputs/Checkbox";
    import CustomLabel from '@/Components/Inputs/Label'
    import CustomValidationErrors from '@/Components/Common/ValidationErrors'
    import {InertiaLink} from "@inertiajs/inertia-vue";
    import PasswordSecureLabel from "../../Components/Inputs/PasswordSecureLabel";

    export default {
        components: {
            PasswordSecureLabel,
            CustomAuthenticationCard,
            CustomAuthenticationCardLogo,
            CustomButton,
            CustomInput,
            InputCheckbox,
            CustomLabel,
            CustomValidationErrors,
            InertiaLink
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                }),
                passLabel: {
                    validPassword: false,
                    uppercase: false,
                    number: false,
                    specialChar: false,
                    maxLength: false,
                },
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            },
            checkPasswordLabel() {
                this.passLabel.maxLength = this.form.password.length;
                const format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

                if (this.passLabel.maxLength >= 8) {
                    this.passLabel.maxLength = true;
                } else {
                    this.passLabel.maxLength = false;
                }

                this.passLabel.number = /\d/.test(this.form.password);
                this.passLabel.uppercase = /[A-Z]/.test(this.form.password);
                this.passLabel.specialChar = format.test(this.form.password);

                if (this.passLabel.maxLength === true &&
                    this.passLabel.specialChar === true &&
                    this.passLabel.uppercase === true &&
                    this.passLabel.number === true) {
                    this.passLabel.validPassword = true;
                } else {
                    this.passLabel.validPassword = false;
                }
            },
            inputHandler(value, name) {
                this.form = {...this.form, [name]: value};
                if (name === 'password') {
                    this.checkPasswordLabel();
                }
            }
        }
    }
</script>
