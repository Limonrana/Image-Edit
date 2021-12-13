<template>
    <!-- BEGIN: Content -->
    <app-layout>
        <div class="OrderView">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <div class="intro-y flex flex-col sm:flex-row items-center mr-auto">
                <h2 class="text-lg font-medium">
                    #ORDER-1001
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <span class="badge ml-3" :class="paymentStatusClass.badge">
                        <span class="legend-indicator" :class="paymentStatusClass.bg"></span> {{ order.payment_status }}
                    </span>
                    <span class="badge ml-3" :class="statusDetails.badge">
                        <span class="legend-indicator" :class="statusDetails.bg"></span> {{ statusDetails.title }}
                    </span>
                    <span class="ml-3">{{ order.created_at | moment('MMM D, YYYY') }}</span>
                </div>
            </div>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <inertia-link :href="route('user.invoice.show', invoice_number)" class="btn btn-primary shadow-md flex items-center mr-2" v-if="invoice_number">Invoice</inertia-link>
                <button type="button" class="btn btn-primary shadow-md flex items-center mr-2" v-else>Invoice</button>
                <button type="button" class="btn box text-gray-700 dark:text-gray-300 flex items-center ml-auto sm:ml-0">
                    Cancel Request
                </button>
            </div>
        </div>
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Order Content -->
            <div class="intro-y col-span-12 lg:col-span-8" ref="order_contents">
                <div class="intro-y overflow-hidden box">
                    <div class="px-5 py-10">
                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                            <order-list :order="order" />
                        </div>
                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                                All Files
                            </div>
                            <div class="mt-5">
                                <div class="mt-3">
                                    <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in" v-for="file in order.upload_files">
                                                <img class="rounded-md" :alt="file.name" :src="`/${file.path}`">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Content -->
            <!-- BEGIN: Post Info -->
            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box mb-5">
                    <count-down-time :order-created="order.created_at" :deadline="order.deadline" />
                </div>
                <div class="intro-y box">
                    <order-chat :height="getHeight" />
                </div>
            </div>
            <!-- END: Post Info -->
        </div>
    </div>
    </app-layout>
    <!-- END: Content -->
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import OrderList from "../../Components/Order/OrderList";
import CountDownTime from "../../Components/Order/CountDownTime";
import OrderChat from "../../Components/Order/OrderChat";
import {InertiaLink} from "@inertiajs/inertia-vue";

export default {
    name: "OrderView",
    props: ['order', 'invoice_number'],
    components: {OrderChat, CountDownTime, OrderList, InertiaLink, AppLayout},
    data() {
        return {
            getHeight: 300,
        }
    },
    mounted() {
        this.setSectionHeight();
    },
    computed: {
        paymentStatusClass() {
            let result = {};
            if (this.order.payment_status === 'Paid') {
                result = {bg: 'bg-success', badge: 'badge-soft-success'};
            } else if (this.order.payment_status === 'Unpaid') {
                result = {bg: 'bg-danger', badge: 'badge-soft-danger'};
            }
            return result;
        },
        statusDetails() {
            let result = {};
            if (this.order.status === 0) {
                result = {bg: 'bg-dark', badge: 'badge-soft-dark', title: 'UnderReview'};
            } else if (this.order.payment_status === 1) {
                result = {bg: 'bg-success', badge: 'badge-soft-success', title: 'Open'};
            } else if (this.order.payment_status === 2) {
                result = {bg: 'bg-info', badge: 'badge-soft-info', title: 'Delivered'};
            } else if (this.order.payment_status === 3) {
                result = {bg: 'bg-success', badge: 'badge-soft-success', title: 'Completed'};
            } else if (this.order.payment_status === 4) {
                result = {bg: 'bg-danger', badge: 'badge-soft-danger', title: 'Cancelled'};
            }
            return result;
        }
    },
    methods: {
        setSectionHeight() {
            this.getHeight = this.$refs.order_contents.offsetHeight;
        }
    }
}
</script>

<style scoped>

</style>
