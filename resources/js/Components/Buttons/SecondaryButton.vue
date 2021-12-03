<template>
    <button :type="type" class="btn btn-secondary w-auto">
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
