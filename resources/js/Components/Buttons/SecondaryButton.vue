<template>
    <button :type="type" class="btn btn-secondary w-24">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'button',
            }
        }
    }
</script>
