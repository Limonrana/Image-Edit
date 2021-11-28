<template>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
        <div class="intro-x flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Transactions
            </h2>
        </div>
        <div class="mt-5">
            <transaction-item
                invoice-number="INV-1923195"
                date="10 March 2021"
                amount="162"
                :is-failed="false"
                src="../../images/profile-3.jpg" />

            <transaction-item
                invoice-number="INV-1924196"
                date="8 November 2020"
                amount="72"
                :is-failed="false"
                src="../../images/profile-1.jpg" />

            <transaction-item
                invoice-number="INV-1924197"
                date="30 June 2021"
                amount="32"
                :is-failed="true"
                src="../../images/profile-2.jpg" />
            <transaction-item
                invoice-number="INV-1924198"
                date="30 June 2021"
                amount="54"
                :is-failed="true"
                src="../../images/profile-2.jpg" />

            <transaction-item
                invoice-number="INV-1924199"
                date="18 November 2021"
                amount="323"
                :is-failed="false"
                src="../../images/profile-1.jpg" />

            <transaction-item
                invoice-number="INV-1924201"
                date="18 July 2021"
                amount="121"
                :is-failed="false"
                src="../../images/profile-1.jpg" />

            <inertia-link :href="route('dashboard')" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-27 dark:border-dark-5 text-theme-28 dark:text-gray-600">View More</inertia-link>
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
