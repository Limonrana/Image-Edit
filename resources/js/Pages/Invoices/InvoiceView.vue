<template>
    <!-- BEGIN: Content -->
    <app-layout>
        <div class="Invoice">
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    INVOICE
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <button class="btn btn-primary w-20 shadow-md mr-2" @click="doPrint">Print</button>
                </div>
            </div>
            <!-- BEGIN: Invoice -->
            <div class="intro-y box overflow-hidden mt-5 printOrder-data">
                <user-details :user="user" :address="address" :invoice="invoice" />
                <div class="px-5 sm:px-16 py-10 sm:py-20">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">DESCRIPTION</th>
                                <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">QTY</th>
                                <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">PRICE</th>
                                <th class="border-b-2 dark:border-dark-5 text-right whitespace-nowrap">SUBTOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border-b dark:border-dark-5">
                                    <div class="font-medium whitespace-nowrap">{{ invoice.order.complexity.name }}</div>
                                    <div class="text-gray-600 text-sm mt-0.5 whitespace-nowrap">Image Complexity Level</div>
                                </td>
                                <td class="text-right border-b dark:border-dark-5 w-32">{{ invoice.order.qty }}</td>
                                <td class="text-right border-b dark:border-dark-5 w-32">${{ parseFloat(invoice.order.cp_price).toFixed(2) }}</td>
                                <td class="text-right border-b dark:border-dark-5 w-32 font-medium">${{ parseFloat(invoice.order.cp_price * invoice.order.qty).toFixed(2) }}</td>
                            </tr>
                            <tr v-for="orderDetail in orderDetails" :key="orderDetail.id">
                                <td class="border-b dark:border-dark-5">
                                    <div class="font-medium whitespace-nowrap">{{ orderDetail.service.title }} ({{ orderDetail.name }})</div>
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
                <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
                    <div class="text-center sm:text-left mt-10 sm:mt-0">
                        <div class="text-base text-gray-600">Payment Method</div>
                        <div class="text-lg text-theme-17 dark:text-gray-300 font-medium mt-2">{{ invoice.order.payment_method }}</div>
                        <div class="mt-1">Transaction Id : {{ invoice.order.transaction_id }}</div>
                    </div>
                    <div class="text-center sm:text-right sm:ml-auto">
                        <div class="text-base text-gray-600">Total Amount</div>
                        <div class="text-xl text-theme-17 dark:text-gray-300 font-medium mt-2">${{ parseFloat(invoice.order.total).toFixed(2) }}</div>
                        <div class="mt-1 tetx-xs">Taxes included</div>
                    </div>
                </div>
            </div>
            <!-- END: Invoice -->
        </div>
    </app-layout>
    <!-- END: Content -->
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import UserDetails from "../../Components/Invoice/UserDetails";

export default {
    name: "InvoiceView",
    props: ['user', 'invoice', 'address', 'orderDetails'],
    components: {UserDetails, AppLayout},
    mounted() {
        console.log(this.address);
    },
    methods: {
        doPrint () {
            document.body.innerHTML = document.getElementsByClassName('printOrder-data')[0].innerHTML;
            window.print();
            // Reload the page to refresh the data
            window.location.reload();
        }
    }
}
</script>

<style scoped>

</style>
