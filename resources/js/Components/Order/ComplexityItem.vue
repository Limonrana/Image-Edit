<template>
    <div class="col-span-6 text-center"
         :class="[active ? '2xl:col-span-4 box bg-theme-17 dark:bg-theme-17 pb-5 cursor-pointer zoom-in' :
         '2xl:col-span-4 box pb-5 cursor-pointer zoom-in', colSpanSize]" @click="handleComplexity()">
        <div class="font-icon mb-3">
            <img class="complexity-image" :src="`${$page.props.app_url}/${complexity.image.path}`" alt="complexity-image" />
        </div>
        <div class="font-medium text-base" :class="active ? 'text-white' : ''">
            <slot></slot>
        </div>
        <div class="text-theme-33 dark:text-gray-400">${{ complexity.price }} Per/Image</div>
    </div>
</template>

<script>
export default {
    name: "ComplexityItem",
    props: ['complexity', 'count', 'active'],
    computed: {
        colSpanSize() {
            return this.count >= 4 ? 'sm:col-span-3' : 'sm:col-span-4';
        }
    },
    methods: {
        handleComplexity() {
            this.$emit('handle-complexity', this.complexity.id);
        }
    }
}
</script>

<style scoped>
    img.complexity-image {
        width: 100%;
        max-height: 100px;
        min-height: 100px;
        object-fit: cover;
    }
</style>
