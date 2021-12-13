<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                General Report
                            </h2>
                            <inertia-link :href="route('user.dashboard')" class="ml-auto flex items-center text-theme-26 dark:text-theme-33">
                                <refresh-ccw-icon size="1.5x" class="w-4 h-4 mr-3"></refresh-ccw-icon> Reload Data
                            </inertia-link>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <report-card-box title="Total Spend" :gross-amount="`$${card_items.total_spend}`">
                                <trello-icon size="1.5x" class="report-box__icon text-theme-21"></trello-icon>
                            </report-card-box>

                            <report-card-box title="Last Month Spend" :gross-amount="`$${card_items.month_spend}`">
                                <credit-card-icon size="1.5x" class="report-box__icon text-theme-22"></credit-card-icon>
                            </report-card-box>

                            <report-card-box title="Total Orders" :gross-amount="card_items.total_orders">
                                <shopping-cart-icon size="1.5x" class="report-box__icon text-theme-23"></shopping-cart-icon>
                            </report-card-box>

                            <report-card-box title="Last Month Order" :gross-amount="card_items.month_orders">
                                <pie-chart-icon size="1.5x" class="report-box__icon text-theme-10"></pie-chart-icon>
                            </report-card-box>
                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN: Sales Report -->
                    <div class="col-span-12 lg:col-span-8 mt-8">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Sales Report
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <div class="flex flex-col xl:flex-row xl:items-center">
                                <div class="flex">
                                    <div>
                                        <div class="text-theme-26 dark:text-gray-300 text-lg xl:text-xl font-medium">${{ card_items.month_spend }}</div>
                                        <div class="mt-0.5 text-gray-600 dark:text-gray-600">Last Month</div>
                                    </div>
                                    <div class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-5"></div>
                                    <div>
                                        <div class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium">${{ card_items.last_year }}</div>
                                        <div class="mt-0.5 text-gray-600 dark:text-gray-600">Last year</div>
                                    </div>
                                </div>
                            </div>
                            <div class="report-chart">
                                <line-chart chart-id="report-line-chart" :height="225" class="mt-6" :chart-data="reportLineChartData" :chart-labels="reportLineChartLabel"></line-chart>
                            </div>
                        </div>
                    </div>
                    <!-- END: Sales Report -->
                    <!-- BEGIN: Top Services -->
                    <div class="col-span-12 lg:col-span-4 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Top Services
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <pie-chart chart-id="report-pie-chart" :height="400" class="mt-3" :chart-data="topServicesArrayChart.data" :chart-labels="topServicesArrayChart.label"></pie-chart>
                            <div class="mt-8 mb-4">
                                <div class="flex items-center mt-4" v-for="service in topNewServices">
                                    <div class="w-2 h-2 bg-theme-17 rounded-full mr-3"></div>
                                    <span class="truncate">{{ service.name }}</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">{{ service.percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Top Services -->
                    <!-- BEGIN: Official Store -->
                    <div class="col-span-12 xl:col-span-8 mt-6">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                My Location
                            </h2>
                            <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                                <map-pin-icon size="1.5x" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></map-pin-icon>
                                <input type="text" class="form-control sm:w-40 box pl-10" placeholder="Find any location">
                            </div>
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <location-map></location-map>
                        </div>
                    </div>
                    <!-- END: Official Store -->
                    <!-- BEGIN: Recent Orders -->
                    <recent-orders>
                        <template v-for="order in orders">
                            <recent-order-item :order-number="order.order_number" :date="order.created_at" :is-paid="order.payment_status"/>
                        </template>
                    </recent-orders>
                    <!-- END: Recent Orders -->
                </div>
            </div>
            <div class="col-span-12 2xl:col-span-3">
                <div class="2xl:border-l border-theme-25 -mb-10 pb-10">
                    <div class="2xl:pl-6 grid grid-cols-12 gap-6">
                        <!-- BEGIN: Transactions -->
                        <transactions>
                            <template v-for="invoice in invoices">
                                <transaction-item :invoice-number="invoice.invoice_number" :date="invoice.created_at" :amount="invoice.total" :is-failed="invoice.status === 0"/>
                            </template>
                        </transactions>
                        <!-- END: Transactions -->
                        <!-- BEGIN: Recent Activities -->
                        <recent-activities>
                            <template v-for="recent in findNewRecentActivity">
                                <div class="intro-x text-gray-500 text-xs text-center my-4" v-if="recent.isShowDate">
                                    {{ recent.created_at | moment("D MMMM") }}
                                </div>
                                <recent-activities-item :name="$page.props.user.name" :time="recent.created_at | moment('hh:mm A')" :src="$page.props.user.profile_photo_url">
                                    <span>
                                        {{ recent.text }} an new order
                                        <inertia-link class="text-theme-26 dark:text-theme-33" :href="route('user.orders.show', recent.order_number)">
                                            #ORDER-{{ recent.order_number }}
                                        </inertia-link>
                                    </span>
                                </recent-activities-item>
                            </template>
                        </recent-activities>
                        <!-- END: Recent Activities -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
    import { RefreshCcwIcon, ShoppingCartIcon, CreditCardIcon, PieChartIcon, TrelloIcon, ChevronDownIcon, MapPinIcon } from 'vue-feather-icons';
    import { InertiaLink } from '@inertiajs/inertia-vue';
    import AppLayout from '@/Layouts/AppLayout'
    import ReportCardBox from "@/Components/Dashboard/Common/ReportCardBox";
    import LineChart from "@/Components/Charts/LineChart";
    import DropdownButton from "@/Components/Buttons/DropdownButton";
    import DropdownButtonItem from "@/Components/Buttons/DropdownButtonItem";
    import PieChart from "@/Components/Charts/PieChart";
    import DonutChart from "@/Components/Charts/DonutChart";
    import LocationMap from "@/Components/Dashboard/Common/LocationMap";
    import RecentActivities from "@/Components/Dashboard/RecentActivities";
    import Transactions from "@/Components/Dashboard/Transactions";
    import RecentOrders from "../../Components/Dashboard/RecentOrders";
    import RecentOrderItem from "../../Components/Dashboard/common/RecentOrderItem";
    import TransactionItem from "../../Components/Dashboard/common/TransactionItem";
    import RecentActivitiesItem from "../../Components/Dashboard/common/RecentActivitiesItem";

    export default {
        name: 'Dashboard',
        props: ['card_items', 'result_per_spent', 'result_per_cancel', 'top_services', 'invoices', 'orders', 'recent_activity'],
        components: {
            RecentActivitiesItem,
            TransactionItem,
            RecentOrderItem,
            RecentOrders,
            Transactions,
            RecentActivities,
            LocationMap,
            DonutChart,
            PieChart,
            DropdownButtonItem,
            DropdownButton,
            LineChart,
            InertiaLink,
            ReportCardBox,
            AppLayout,
            RefreshCcwIcon,
            ShoppingCartIcon,
            CreditCardIcon,
            PieChartIcon,
            TrelloIcon,
            ChevronDownIcon,
            MapPinIcon,
        },
        data() {
          return {
              reportLineChartData: {
                  firstData: this.result_per_spent,
                  secondData: this.result_per_cancel,
              },
              reportLineChartLabel: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
              weeklyTopSellData: [15, 10, 65],
              weeklyTopSellLabel: ["Yellow", "Dark"],
              reportDonutChartData: [15, 10, 65],
              reportDonutChartLabel: ["Yellow", "Dark"],
              date: null,
          }
        },
        computed: {
            findNewRecentActivity() {
                let activity = this.recent_activity;
                let newActivity = [];
                let date = null;
                for (let activityElement of activity) {
                    // split date
                    let splitDate = activityElement.updated_at.split('T')[0];
                    let newObj = {
                        id: activityElement.id,
                        order_number: activityElement.order_number,
                        created_at: activityElement.created_at,
                        delivered: !!activityElement.delivered,
                        completed: activityElement.status === 3,
                        isShowDate: date !== splitDate,
                    };

                    if (newActivity.length < 6) {
                        newActivity.push({...newObj, text: 'Created'});
                        if (newObj.delivered && newActivity.length < 6) {
                            newActivity.push({...newObj, text: 'Delivered'});
                        }
                        if (newObj.completed && newActivity.length < 6) {
                            newActivity.push({...newObj, text: 'Completed'});
                        }
                    }

                    // push date
                    if (date !== splitDate) {
                        date = splitDate;
                    }
                    newObj = {};
                }
                return newActivity;
            },
            topNewServices() {
                let services = this.top_services;
                let newServices = [];
                let countDetails = this.top_services.reduce((sum, x) => sum + x.order_details,0);
                for (let service of services) {
                    let percentage = Math.round((service.order_details / countDetails) * 100);
                    let newObj = {name: service.name, order_details: service.order_details, percentage: percentage};
                    newServices.push(newObj);
                }
                return newServices;
            },
            topServicesArrayChart() {
                let services = this.top_services;
                let data = [];
                let label = [];
                let countDetails = this.top_services.reduce((sum, x) => sum + x.order_details,0);
                for (let service of services) {
                    label.push(service.name);
                    data.push(Math.round((service.order_details / countDetails) * 100));
                }
                return {data, label};
            }
        }
    }
</script>

<style scoped>

</style>
