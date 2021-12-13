<template>
    <div class="col-span-12 xl:col-span-4 mt-6">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Recent Orders
            </h2>
        </div>
        <div class="mt-5">
            <slot></slot>
            <inertia-link :href="route('user.orders', { status: 'all' })" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-27 dark:border-dark-5 text-theme-28 dark:text-gray-600">
                View More
            </inertia-link>
        </div>
    </div>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "RecentOrders",
    components: {InertiaLink}
}
</script>

<style scoped>

</style>
