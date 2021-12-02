<template>
    <div class="intro-y box col-span-12 lg:col-span-6">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                {{ title }}
            </h2>
        </div>
        <div class="p-5">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import OrderItem from "./Common/OrderItem";
export default {
    name: "Orders",
    props: ['title'],
    components: {OrderItem}
}
</script>

<style scoped>

</style>
