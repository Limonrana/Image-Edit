<template>
    <div class="overflow-hidden">
        <!-- BEGIN: Daily Sales -->
        <div class="intro-y box pb-3 col-span-12 lg:col-span-6">
            <div class="px-1 py-5">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">ORDER DETAILS</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">QTY</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">PRICE</th>
                            <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">SUBTOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border-b dark:border-dark-5">
                                <div class="font-medium whitespace-nowrap">{{ order.complexity.name }}</div>
                                <div class="text-gray-600 text-sm mt-0.5 whitespace-nowrap">Image Complexity Level</div>
                            </td>
                            <td class="text-right border-b dark:border-dark-5 w-32">{{ order.qty }}</td>
                            <td class="text-right border-b dark:border-dark-5 w-32">${{ parseFloat(order.cp_price).toFixed(2) }}</td>
                            <td class="text-right border-b dark:border-dark-5 w-32 font-medium">${{ parseFloat(order.cp_price * order.qty).toFixed(2) }}</td>
                        </tr>
                        <tr v-for="orderDetail in order.order_details" :key="orderDetail.id">
                            <td class="border-b dark:border-dark-5">
                                <div class="font-medium whitespace-nowrap">{{ orderDetail.name }}</div>
                                <div class="text-gray-600 text-sm mt-0.5 whitespace-nowrap">Service Addons</div>
                            </td>
                            <td class="text-right border-b dark:border-dark-5 w-32">{{ orderDetail.qty }}</td>
                            <td class="text-right border-b dark:border-dark-5 w-32">${{ parseFloat(orderDetail.price).toFixed(2) }}</td>
                            <td class="text-right border-b dark:border-dark-5 w-32 font-medium">${{ parseFloat(orderDetail.total_price).toFixed(2) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="py-5 sm:px-1 sm:flex flex-col-reverse sm:flex-row">
                <div class="text-center sm:text-left mt-10 sm:mt-0">
                    <div class="text-base text-gray-600">Payment Method</div>
                    <div class="text-lg text-theme-17 dark:text-gray-300 font-medium mt-2">{{ order.payment_method }}</div>
                    <div class="mt-1">Transaction Id : {{ order.transaction_id ? order.transaction_id : 'Manual' }}</div>
                </div>
                <div class="text-center sm:text-right sm:ml-auto">
                    <div class="text-base text-gray-600">Total Amount</div>
                    <div class="text-xl text-theme-17 dark:text-gray-300 font-medium mt-2">${{ parseFloat(order.total).toFixed(2) }}</div>
                    <div class="mt-1 tetx-xs">Taxes included</div>
                </div>
            </div>
        </div>
        <!-- END: Daily Sales -->
    </div>
</template>

<script>
export default {
    name: "OrderList",
    props: ['order'],
}
</script>

<style scoped>

</style>
