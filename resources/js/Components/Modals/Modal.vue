<template>
    <!-- BEGIN: Modal Content -->
    <MountingPortal mountTo="#modalWidget" name="source" append>
        <div class="modal" :class="show ? `overflow-y-auto show modal-show ${classes}` : ''">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <slot name="title"></slot>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body">
                        <slot name="content"></slot>
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-outline-secondary w-20 mr-1" @click="close">Cancel</button>
                        <slot name="action"></slot>
                    </div>
                    <!-- END: Modal Footer -->
                </div>
            </div>
        </div>
    </MountingPortal>
    <!-- END: Modal Content -->
</template>

<script>
import { Portal, PortalTarget, MountingPortal } from 'portal-vue'

export default {
        props: {
            show: {
                default: false
            },
            classes: {
                type: String,
                default: 'modal-empty',
            }
        },
        components: {Portal, PortalTarget, MountingPortal},
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
