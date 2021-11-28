<template>
    <!-- BEGIN: Notification Content -->
    <div class="toastify toastify-right toastify-top" :class="show ? 'on' : 'hidden'" style="right: 0px; transform: translate(0px, 0px); top: -48px;">
        <div class="toastify-content flex">
            <check-circle-icon size="1.5x" class="text-theme-10"></check-circle-icon>
            <div class="ml-4 mr-4">
                <div class="font-medium">
                    <slot></slot>
                </div>
            </div>
        </div>
        <span class="toast-close" @click="handleClose">✖</span>
    </div>
    <!-- END: Notification Content --> <!-- BEGIN: Notification Toggle -->
</template>

<script>
import { CheckCircleIcon } from 'vue-feather-icons';

export default {
    name: "SuccessNotification",
    props: ['show'],
    components: {CheckCircleIcon},
    methods: {
        handleClose() {
            this.$emit('close-notification', false);
        }
    }
}
</script>

<style scoped>

</style>
