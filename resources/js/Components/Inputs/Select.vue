<template>
    <select class="form-select" :value="value" @input="onInput">
        <slot></slot>
    </select>
</template>

<script>
export default {
    name: "Select",
    props: ['value'],

    methods: {
        onInput(event) {
            this.$emit('handle-input', event.target.value, event.target.name);
        },
    }
}
</script>

<style scoped>

</style>
