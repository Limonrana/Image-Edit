<template>
    <secondary-modal :show="show" @close="close">
        <div class="px-6 py-4">
            <div class="text-lg">
                <slot name="title">
                </slot>
            </div>

            <div class="mt-4">
                <slot name="content">
                </slot>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 text-right">
            <slot name="footer">
            </slot>
        </div>
    </secondary-modal>
</template>

<script>
    import SecondaryModal from './SecondaryModal'

    export default {
        components: {
            SecondaryModal,
        },

        props: {
            show: {
                default: false
            }
        },

        methods: {
            close() {
                this.$emit('close')
            },
        }
    }
</script>
