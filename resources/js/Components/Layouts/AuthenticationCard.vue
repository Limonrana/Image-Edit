<template>
    <div class="login-section">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <slot name="logo" />
                    <div class="my-auto">
                        <img alt="Icewall-Bg-Image" class="-intro-x w-1/2 -mt-16" :src="'../../images/illustration.svg'">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            A few more clicks to
                            <br>
                            {{ type === 'Login' ? 'sign in to' : 'create'}} your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Manage your accounts in one place</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <slot />
            </div>
        </div>
        <dark-mode-switcher />
    </div>
</template>
<script>
import DarkModeSwitcher from "../Partials/DarkModeSwitcher";
export default {
    components: {DarkModeSwitcher},
    props: ['type'],
    mounted() {
        document.body.classList.add("login");
    }
}
</script>
