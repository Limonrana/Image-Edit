<template>
    <!-- BEGIN: Modal Content -->
    <MountingPortal mountTo="#modalWidget" name="source" append>
        <div class="modal" :class="{'overflow-y-auto show modal-show' : show }">
            <div class="modal-dialog">
                <div class="modal-content">
                    <slot></slot>
                </div>
            </div>
        </div>
    </MountingPortal>
    <!-- END: Modal Content -->
</template>

<script>
import { MountingPortal } from 'portal-vue'
export default {
    name: "SecondaryModal",
    props: {
        show: {
            default: false
        }
    },

    components: {MountingPortal},

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

