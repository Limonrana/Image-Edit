<template>
    <input class="show-code form-check-switch mr-0 ml-3" type="checkbox" :value="inputValue" v-model="model" >
</template>

<script>
export default {
    name: "SwatchInput",
    props: {
        value: Array,
        inputValue: String,
    },
    computed: {
        model: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit("input", value);
            },
        },
    },
}
</script>

<style scoped>

</style>
