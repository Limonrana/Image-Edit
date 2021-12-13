<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    My Profile
                </h2>
            </div>
            <!-- BEGIN: Profile Info -->
            <profile-info :user="user" :total-orders="orders.length" :total-spend="totalSpend" />
            <!-- END: Profile Info -->
            <div class="tab-content mt-5">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Latest Uploads -->
                    <uploads title="Latest Uploads">
<!--                        <upload-item id="1" size="40 MB" src="file" :mt="false">Documentation.zip</upload-item>-->
                        <template v-if="latestUploads.length > 0">
                            <template v-for="(latest, index) in latestUploads">
                                <upload-item :id="latest.id" :name="latest.name" :size="`${latest.size / 1000000} KB`" :src="`/${latest.path}`" :mt="index !== 0" />
                            </template>
                        </template>
                        <template v-else>
                            <empty-state title="OOPS! No latest uploads found" description="Get started by creating a new order." classes="h-auto" />
                        </template>
                    </uploads>
                    <!-- END: Latest Uploads -->
                    <!-- BEGIN: Orders In Progress -->
                    <orders-progress title="Orders In Progress">
                        <progress-item :total="openOrders.length" :all-total="orders.length" type="progress">Orders In Progress</progress-item>
                        <progress-item :total="reviewOrder.length" :all-total="orders.length" type="pending" mt="mt-5">Orders In Pending</progress-item>
                        <progress-item :total="completeOrders.length" :all-total="orders.length" type="completed" mt="mt-5">Orders In Completed</progress-item>
                        <progress-item :total="cancelOrders.length" :all-total="orders.length" type="cancelled" mt="mt-5">Orders In Cancelled</progress-item>
                    </orders-progress>
                    <!-- END: Work In Progress -->
                    <!-- BEGIN: Delivered Orders -->
                    <orders title="Delivered Orders">
                        <template v-if="deliveredOrders.length > 0">
                            <template v-for="delivered in deliveredOrders">
                                <order-item :href="route('user.orders.show', delivered.order_number)" :created-at="delivered.created_at | moment('MMM D, YYYY')" :total="delivered.total">
                                    #ORDER-{{ delivered.order_number }}
                                </order-item>
                            </template>
                        </template>
                        <template v-else>
                            <empty-state title="OOPS! No delivered order found" description="Get started by creating a new order." classes="h-auto" />
                        </template>
                    </orders>
                    <!-- END: Delivered Orders -->

                    <!-- BEGIN: Latest Orders -->
                    <orders title="Latest Orders">
                        <template v-if="latestOrders.length > 0">
                            <template v-for="latest in latestOrders">
                                <order-item :href="route('user.orders.show', latest.order_number)" :created-at="latest.created_at | moment('MMM D, YYYY')" :total="latest.total">
                                    #ORDER-{{ latest.order_number }}
                                </order-item>
                            </template>
                        </template>
                        <template v-else>
                            <empty-state title="OOPS! No latest order found" description="Get started by creating a new order." classes="h-auto" />
                        </template>
                    </orders>
                    <!-- END: Latest Orders -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Orders from "../../Components/Profile/Orders";
    import OrdersProgress from "../../Components/Profile/OrdersProgress";
    import Uploads from "../../Components/Profile/Uploads";
    import ProfileInfo from "../../Components/Profile/ProfileInfo";
    import OrderItem from "../../Components/Profile/Common/OrderItem";
    import ProgressItem from "../../Components/Profile/Common/ProgressItem";
    import UploadItem from "../../Components/Profile/Common/UploadItem";
    import EmptyState from "../../Components/Common/EmptyState";

    export default {
        props: ['user', 'orders', 'latestOrders', 'latestUploads', 'deliveredOrders'],

        components: {EmptyState, OrderItem, ProfileInfo, Uploads, OrdersProgress, ProgressItem, Orders, UploadItem, AppLayout },
        data() {
            return {

            }
        },
        computed: {
            openOrders() {
                return this.orders.filter(x => x.status === 1);
            },
            reviewOrder() {
                return this.orders.filter(x => x.status === 0);
            },
            completeOrders() {
                return this.orders.filter(x => x.status === 3);
            },
            cancelOrders() {
                return this.orders.filter(x => x.status === 4);
            },
            totalSpend() {
                return this.orders.reduce((sum, x) => sum + parseFloat(x.total), 0);
            }
        }
    }
</script>
