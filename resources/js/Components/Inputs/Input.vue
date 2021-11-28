<template>
    <input class="intro-x login__input form-control py-3 px-4 border-gray-300 block" :value="value" @input="onInput" />
</template>

<script>
    export default {
        props: ['value'],

        methods: {
            onInput(event) {
                this.$emit('handle-input', event.target.value, event.target.name);
            },
        }
    }
</script>

