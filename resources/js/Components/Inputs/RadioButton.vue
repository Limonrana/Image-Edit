<template>
    <div class="form-check" :class="classes ? classes : ''">
        <input :id="inputValue" class="form-check-input" type="radio" :name="name" :value="inputValue" @change="handleRadio" :checked="isChecked">
        <label class="form-check-label" :for="inputValue"><slot></slot></label>
    </div>
</template>

<script>
export default {
    name: "RadioButton",
    props: {
        name: String,
        inputValue: String,
        isChecked: {
            type: Boolean,
            default: false,
        },
        classes: String,
    },
    methods: {
        handleRadio(option) {
            this.$emit('handle-input', option.target.value);
        }
    }
}
</script>

<style scoped>

</style>
