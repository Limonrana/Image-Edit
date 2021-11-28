<template>
    <input class="form-control" :value="value" @input="onInput" />
</template>

<script>
export default {
    name: "SimpleInput",
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
