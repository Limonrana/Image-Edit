<template>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
        <div class="intro-x flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Latest Invoices
            </h2>
        </div>
        <div class="mt-5">
            <slot />
            <inertia-link :href="route('user.invoices')" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-27 dark:border-dark-5 text-theme-28 dark:text-gray-600">View More</inertia-link>
        </div>
    </div>
</template>

<script>
import TransactionItem from "./common/TransactionItem";
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "Transactions",
    components: {TransactionItem, InertiaLink}
}
</script>

<style scoped>

</style>
