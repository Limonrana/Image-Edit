<template>
    <div class="border-b border-gray-200 dark:border-dark-5 text-center sm:text-left">
        <div class="flex justify-between">
            <div class="px-5 py-10 sm:px-20 sm:py-20">
                <div class="text-theme-17 dark:text-gray-300 font-semibold text-3xl">INVOICE</div>
                <div class="mt-2"> Receipt <span class="font-medium">#INV-{{ invoice.invoice_number }}</span> </div>
                <div class="mt-1">Created Date: {{ invoice.created_at | moment('MMM D, YYYY') }}</div>
                <div class="mt-1">Due Date: {{ invoice.due_date | moment('MMM D, YYYY') }}</div>
            </div>
            <div class="px-5 py-10 sm:px-20 sm:py-20">
                <div class="text-theme-10 dark:text-gray-300 font-semibold text-3xl">{{ invoice.order.payment_status.toUpperCase() }}</div>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row px-5 sm:px-20 pt-10 pb-10 sm:pb-20">
            <div>
                <div class="text-base">Invoiced To</div>
                <div class="text-lg font-medium text-theme-17 dark:text-gray-300 mt-2">{{ user.name }}</div>
                <div class="mt-1">{{ address.address_line_1 }}</div>
                <div class="mt-1">{{ `${address.city}, ${address.state}, ${address.zip_code}` }}</div>
                <div class="mt-1">{{ address.country }}</div>
                <div class="mt-1">{{ user.email }}</div>
                <div class="mt-1">{{ user.phone }}</div>
            </div>
            <div class="lg:text-right mt-10 lg:mt-0 lg:ml-auto">
                <div class="text-base">Pay To</div>
                <div class="text-lg font-medium text-theme-17 dark:text-gray-300 mt-2">Omega Studio LTD</div>
                <div class="mt-1">Senpara Porbota, Mirpur - 10</div>
                <div class="mt-1">Dhaka - 1216, Bangladesh</div>
                <div class="mt-1">www.omegastudio.com</div>
                <div class="mt-1">support@omegastudio.com</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserDetails",
    props: ['user', 'address', 'invoice'],
}
</script>

<style scoped>

</style>
