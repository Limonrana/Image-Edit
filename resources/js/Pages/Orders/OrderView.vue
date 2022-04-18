<template>
    <!-- BEGIN: Content -->
    <app-layout>
        <div class="OrderView">
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <div class="intro-y flex flex-col sm:flex-row items-center mr-auto">
                    <h2 class="text-lg font-medium">
                        #ORDER-{{ order.order_number }}
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
                    <button type="button" @click="orderCancel" class="btn box text-gray-700 dark:text-gray-300 flex items-center ml-auto sm:ml-0" :disabled="order.status === 3">
                        Dispute Request
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
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5" v-if="order.delivered !== null">
                                <div class="font-medium flex items-center justify-content-between border-b border-gray-200 dark:border-dark-5 pb-5">
                                    <h2 class="font-medium text-base mr-auto">Delivered Files</h2>
                                    <a :href="route('user.orders.delivery.download', order.id)" class="btn btn-outline-secondary hidden sm:flex" v-if="order.payment_status === 'Paid'">Download All</a>
                                    <div v-else>
                                        <span class="badge badge-soft-danger">
                                            <span class="legend-indicator bg-danger"></span> Payment Due
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="mt-3">
                                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4" v-if="order.delivery_files.length > 0">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in" v-for="file in order.delivery_files">
                                                    <img class="rounded-md" :alt="file.name" :src="`/${file.path}`">
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap px-4" v-else>
                                                <div class="intro-y flex-1 px-5 py-16">
                                                    <div class="text-xl font-medium text-center mt-10">Delivery File Not Found</div>
                                                    <div class="flex justify-center">
                                                        <div class="relative text-5xl font-semibold mt-8 mx-auto">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity block w-12 h-12 text-theme-17 dark:text-gray-300 mx-auto"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                                    Order Files
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
                    <div class="intro-y box mb-5" v-if="order.delivered === null">
                        <count-down-time :order-created="order.created_at" :deadline="order.deadline" />
                    </div>
                    <div class="intro-y box mb-5" v-else>
                        <div class="intro-y flex-1 px-5 py-5" v-if="order.status === 3">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag block w-12 h-12 text-theme-17 dark:text-gray-300 mx-auto"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                            <div class="text-xl font-medium text-center mt-2">Order Completed</div>
                            <div class="text-center mx-auto mt-2">
                                <div class="font-medium">
                                    <span class="text-theme-17">{{ diffForHumansComplete }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y flex-1 px-5 py-5" v-else>
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag block w-12 h-12 text-theme-17 dark:text-gray-300 mx-auto"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                            <div class="text-xl font-medium text-center mt-2">Delivered</div>
                            <div class="text-center mx-auto mt-2">
                                <div class="font-medium">
                                    <span class="text-theme-17">{{ diffForHumans }} </span>
                                </div>
                            </div>
                            <button @click="acceptOrder" class="btn btn-rounded-primary py-3 px-4 block mx-auto mt-5">ACCEPT NOW</button>
                        </div>
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
import moment from "moment";

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
            } else if (this.order.status === 1) {
                result = {bg: 'bg-success', badge: 'badge-soft-success', title: 'Open'};
            } else if (this.order.status === 2) {
                result = {bg: 'bg-info', badge: 'badge-soft-info', title: 'Delivered'};
            } else if (this.order.status === 3) {
                result = {bg: 'bg-success', badge: 'badge-soft-success', title: 'Completed'};
            } else if (this.order.status === 4) {
                result = {bg: 'bg-danger', badge: 'badge-soft-danger', title: 'Cancelled'};
            }
            return result;
        },
        diffForHumans() {
            return moment(this.order.delivered).fromNow();
        },
        diffForHumansComplete() {
            return moment(this.order.delivery_accepted).fromNow();
        }
    },
    methods: {
        setSectionHeight() {
            this.getHeight = this.$refs.order_contents.offsetHeight;
        },
        acceptOrder() {
            this.$inertia.get(route('user.orders.approve', this.order.id), {}, {
                preserveScroll: true,
                onError: () => this.$toast.error("OOPS! Something went wrong. Please try again!"),
                onSuccess: () => this.$toast.success('Order was approved successfully!'),
            });
        },
        orderCancel() {
            this.$inertia.get(route('user.orders.cancel', this.order.id), {}, {
                preserveScroll: true,
                onError: () => this.$toast.error("OOPS! Something went wrong. Please try again!"),
                onSuccess: () => this.$toast.success('Order cancel request was send successfully!'),
            });
        }
    }
}
</script>

<style scoped>

</style>
