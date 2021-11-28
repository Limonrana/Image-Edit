<template>
    <input type="checkbox" :value="inputValue" v-model="model"
           class="form-check-input border mr-2">
</template>

<script>
export default {
    name: "Checkbox",
    props: {
        value: Boolean,
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
};
</script>
