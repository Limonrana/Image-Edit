<template>
    <div class="form-check mb-2">
        <input :id="name" class="form-check-input" type="radio" :name="variantName.replace(/\s/g, '_')"
               :value="name.replace(/\s/g, '_')" @change="handleRadio" :checked="isChecked">
        <label class="form-check-label" :for="name"><slot></slot></label>
    </div>
</template>

<script>
export default {
    name: "RadioInput",
    props: {
        name: String,
        variantId: Number,
        variantName: String,
        variantPrice: {},
        isChecked: {
            type: Boolean,
            default: false,
        }
    },
    methods: {
        handleRadio(option) {
            this.$emit('handle-input', option.target.value, this.variantId, this.variantPrice);
        }
    }
}
</script>

<style scoped>

</style>
