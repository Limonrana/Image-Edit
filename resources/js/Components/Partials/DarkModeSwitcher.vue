<template>
    <!-- BEGIN: Dark Mode Switcher-->
    <div @click="handleMode" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle border" :class="mode === 'dark' ? 'dark-mode-switcher__toggle--active' : ''"></div>
    </div>
    <!-- END: Dark Mode Switcher-->
</template>

<script>
export default {
    name: "DarkModeSwitcher",
    data() {
        return {
            mode: localStorage.getItem('theme-mode') ? localStorage.getItem('theme-mode') : 'light',
        }
    },
    mounted() {
        document.documentElement.classList.add(this.mode);
    },
    methods: {
        handleMode() {
            this.changeUI();
            localStorage.setItem('theme-mode', this.mode);
        },
        changeUI() {
            document.documentElement.classList.remove(this.mode);
            if (this.mode === 'light') {
                this.mode = 'dark';
            } else {
                this.mode = 'light';
            }
            document.documentElement.classList.add(this.mode);
        }
    }
}
</script>

<style scoped>

</style>
