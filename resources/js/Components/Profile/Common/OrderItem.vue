<template>
    <div class="relative flex items-center mb-3">
        <div class="border-l-2 border-theme-17 pl-4 mr-auto">
            <inertia-link :href="href">
                <div class="font-medium">
                    <slot></slot>
                </div>
                <div class="text-gray-600 mr-5 sm:mr-5">{{ createdAt }}</div>
            </inertia-link>
        </div>
        <div class="font-medium text-gray-700 dark:text-gray-600">$ {{ total }}</div>
    </div>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "OrderItem",
    props: ['href', 'createdAt', 'total'],
    components: {InertiaLink}
}
</script>

<style scoped>

</style>
