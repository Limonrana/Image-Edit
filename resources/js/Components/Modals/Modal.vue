<template>
    <!-- BEGIN: Modal Content -->
    <div class="modal" :class="show ? 'overflow-y-auto show modal-show' : ''">
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
    <!-- END: Modal Content -->
</template>

<script>

export default {
        props: {
            show: {
                default: false
            }
        },
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
        left: -61.8% !important;
        top: -62% !important;
    }
    .modal.show > .modal-dialog {
        margin-top: 15rem !important;
    }
</style>
