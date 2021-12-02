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
            <profile-info :user="user"></profile-info>
            <!-- END: Profile Info -->
            <div class="tab-content mt-5">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Latest Uploads -->
                    <uploads title="Latest Uploads">
                        <upload-item id="1" size="40 MB" src="file" :mt="false">Documentation.zip</upload-item>
                        <upload-item id="1" size="400 KB" src="../../../images/preview-9.jpg" :mt="true">Preview-9.jpg</upload-item>
                        <upload-item id="1" size="200 MB" src="file" :mt="true">Images.zip</upload-item>
                    </uploads>
                    <!-- END: Latest Uploads -->
                    <!-- BEGIN: Orders In Progress -->
                    <orders-progress title="Orders In Progress">
                        <progress-item total="4" all-total="22" type="progress">Orders In Progress</progress-item>
                        <progress-item total="2" all-total="22" type="pending" mt="mt-5">Orders In Pending</progress-item>
                        <progress-item total="15" all-total="22" type="completed" mt="mt-5">Orders In Completed</progress-item>
                        <progress-item total="1" all-total="22" type="cancelled" mt="mt-5">Orders In Cancelled</progress-item>
                    </orders-progress>
                    <!-- END: Work In Progress -->
                    <!-- BEGIN: Delivered Orders -->
                    <orders title="Delivered Orders">
                        <order-item href="#" created-at="20 min ago" total="230">#ORDER-200125</order-item>
                        <order-item href="#" created-at="2 days ago" total="230">#ORDER-200122</order-item>
                        <order-item href="#" created-at="1 month ago" total="230">#ORDER-200120</order-item>
                    </orders>
                    <!-- END: Delivered Orders -->

                    <!-- BEGIN: Latest Orders -->
                    <orders title="Latest Orders">
                        <order-item href="#" created-at="20 min ago" total="230">#ORDER-200125</order-item>
                        <order-item href="#" created-at="2 days ago" total="230">#ORDER-200122</order-item>
                        <order-item href="#" created-at="1 month ago" total="230">#ORDER-200120</order-item>
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

    export default {
        props: ['sessions', 'user'],

        components: {OrderItem, ProfileInfo, Uploads, OrdersProgress, ProgressItem, Orders, UploadItem, AppLayout },
        data() {
            return {

            }
        },
        methods: {

        }
    }
</script>
