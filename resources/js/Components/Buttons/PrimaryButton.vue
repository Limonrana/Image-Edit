<template>
    <button :type="type" class="btn btn-primary">
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: "PrimaryButton",
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    }
}
</script>

<style scoped>

</style>
