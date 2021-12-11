<template>
    <!-- BEGIN: Modal Content -->
    <MountingPortal mountTo="#modalWidget" name="source" append>
        <div class="modal" :class="show ? 'overflow-y-auto show modal-show' : ''">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <XCircleIcon class="w-16 h-16 text-theme-24 mx-auto mt-3"></XCircleIcon>
                            <div class="text-3xl mt-5">Do you really want to leave?</div>
                            <div class="text-gray-600 mt-2">
                                you have unsaved changes! <br>This process cannot be undone.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1" @click="close">Cancel</button>
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MountingPortal>
    <!-- END: Modal Content -->
</template>

<script>
import {XCircleIcon} from 'vue-feather-icons';
import { MountingPortal } from 'portal-vue';

export default {
    name: "LeaveModal",
    props: {
        show: {
            default: false
        }
    },
    components: {XCircleIcon, MountingPortal},
    methods: {
        close() {
            this.$emit('close', !this.show);
        }
    }
}
</script>

<style scoped>
    .modal-show {
        margin-top: 0 !important;
        margin-left: 0 !important;
        padding-left: 0 !important;
        z-index: 100000 !important;
    }
    .modal.show > .modal-dialog {
        margin-top: 15rem !important;
    }
    .modal .modal-dialog {
        width: 525px;
    }
</style>
