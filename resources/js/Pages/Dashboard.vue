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
                            <inertia-link :href="route('dashboard')" class="ml-auto flex items-center text-theme-26 dark:text-theme-33">
                                <refresh-ccw-icon size="1.5x" class="w-4 h-4 mr-3"></refresh-ccw-icon> Reload Data
                            </inertia-link>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <report-card-box title="Item Sales" gross-amount="4,710" gross-percent="33" :is-gross="true">
                                <shopping-cart-icon size="1.5x" class="report-box__icon text-theme-21"></shopping-cart-icon>
                            </report-card-box>

                            <report-card-box title="New Orders" gross-amount="3,721" gross-percent="2" :is-gross="false">
                                <credit-card-icon size="1.5x" class="report-box__icon text-theme-22"></credit-card-icon>
                            </report-card-box>

                            <report-card-box title="Total Products" gross-amount="2,149" gross-percent="12" :is-gross="true">
                                <monitor-icon size="1.5x" class="report-box__icon text-theme-23"></monitor-icon>
                            </report-card-box>

                            <report-card-box title="Unique Visitor" gross-amount="152,040" gross-percent="22" :is-gross="true">
                                <user-icon size="1.5x" class="report-box__icon text-theme-10"></user-icon>
                            </report-card-box>
                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN: Sales Report -->
                    <div class="col-span-12 lg:col-span-6 mt-8">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Sales Report
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <div class="flex flex-col xl:flex-row xl:items-center">
                                <div class="flex">
                                    <div>
                                        <div class="text-theme-26 dark:text-gray-300 text-lg xl:text-xl font-medium">$15,000</div>
                                        <div class="mt-0.5 text-gray-600 dark:text-gray-600">This Month</div>
                                    </div>
                                    <div class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-5"></div>
                                    <div>
                                        <div class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium">$10,000</div>
                                        <div class="mt-0.5 text-gray-600 dark:text-gray-600">Last Month</div>
                                    </div>
                                </div>
                                <dropdown-button title="Filter by Category">
                                    <dropdown-button-item :href="route('dashboard')">PC & Laptop</dropdown-button-item>
                                    <dropdown-button-item :href="route('dashboard')">Smartphone</dropdown-button-item>
                                    <dropdown-button-item :href="route('dashboard')">Electronic</dropdown-button-item>
                                    <dropdown-button-item :href="route('dashboard')">Photography</dropdown-button-item>
                                    <dropdown-button-item :href="route('dashboard')">Sport</dropdown-button-item>
                                </dropdown-button>
                            </div>
                            <div class="report-chart">
                                <line-chart chart-id="report-line-chart" :height="225" class="mt-6" :chart-data="reportLineChartData" :chart-labels="reportLineChartLabel"></line-chart>
                            </div>
                        </div>
                    </div>
                    <!-- END: Sales Report -->
                    <!-- BEGIN: Weekly Top Seller -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Weekly Top Seller
                            </h2>
                            <a href="" class="ml-auto text-theme-26 dark:text-theme-33 truncate">Show More</a>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <pie-chart chart-id="report-pie-chart" :height="400" class="mt-3" :chart-data="weeklyTopSellData" :chart-labels="weeklyTopSellLabel"></pie-chart>
                            <div class="mt-8">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-theme-17 rounded-full mr-3"></div>
                                    <span class="truncate">17 - 30 Years old</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">62%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-theme-35 rounded-full mr-3"></div>
                                    <span class="truncate">31 - 50 Years old</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">33%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-theme-23 rounded-full mr-3"></div>
                                    <span class="truncate">>= 50 Years old</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Weekly Top Seller -->
                    <!-- BEGIN: Sales Report -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Sales Report
                            </h2>
                            <a href="" class="ml-auto text-theme-26 dark:text-theme-33 truncate">Show More</a>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <donut-chart chart-id="report-donut-chart" :height="400" class="mt-3" :chart-data="reportDonutChartData" :chart-labels="reportDonutChartLabel"></donut-chart>
                            <div class="mt-8">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-theme-17 rounded-full mr-3"></div>
                                    <span class="truncate">17 - 30 Years old</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">62%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-theme-35 rounded-full mr-3"></div>
                                    <span class="truncate">31 - 50 Years old</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">33%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-theme-23 rounded-full mr-3"></div>
                                    <span class="truncate">>= 50 Years old</span>
                                    <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                    <span class="font-medium xl:ml-auto">10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Sales Report -->
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
                    <!-- BEGIN: Weekly Best Sellers -->
                    <div class="col-span-12 xl:col-span-4 mt-6">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Weekly Best Sellers
                            </h2>
                        </div>
                        <div class="mt-5">
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Icewall Tailwind HTML Admin Template" :src="'../../images/profile-3.jpg'">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Robert De Niro</div>
                                        <div class="text-gray-600 text-xs mt-0.5">10 March 2021</div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">137 Sales</div>
                                </div>
                            </div>
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Icewall Tailwind HTML Admin Template" :src="'../../images/profile-1.jpg'">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Johnny Depp</div>
                                        <div class="text-gray-600 text-xs mt-0.5">8 November 2020</div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">137 Sales</div>
                                </div>
                            </div>
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Icewall Tailwind HTML Admin Template" :src="'../../images/profile-2.jpg'">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Kate Winslet</div>
                                        <div class="text-gray-600 text-xs mt-0.5">30 June 2021</div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">137 Sales</div>
                                </div>
                            </div>
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Icewall Tailwind HTML Admin Template" :src="'../../images/profile-9.jpg'">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Al Pacino</div>
                                        <div class="text-gray-600 text-xs mt-0.5">23 September 2020</div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">137 Sales</div>
                                </div>
                            </div>
                            <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-27 dark:border-dark-5 text-theme-28 dark:text-gray-600">View More</a>
                        </div>
                    </div>
                    <!-- END: Weekly Best Sellers -->
                    <!-- BEGIN: Weekly Top Services -->
                    <recent-orders></recent-orders>
                    <!-- END: Weekly Top Services -->
                </div>
            </div>
            <div class="col-span-12 2xl:col-span-3">
                <div class="2xl:border-l border-theme-25 -mb-10 pb-10">
                    <div class="2xl:pl-6 grid grid-cols-12 gap-6">
                        <!-- BEGIN: Transactions -->
                        <transactions></transactions>
                        <!-- END: Transactions -->
                        <!-- BEGIN: Recent Activities -->
                        <recent-activities></recent-activities>
                        <!-- END: Recent Activities -->
                        <!-- BEGIN: Important Notes -->
                        <important-note-slider></important-note-slider>
                        <!-- END: Important Notes -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
    import { RefreshCcwIcon, ShoppingCartIcon, CreditCardIcon, MonitorIcon, UserIcon, ChevronDownIcon, MapPinIcon } from 'vue-feather-icons';
    import { InertiaLink } from '@inertiajs/inertia-vue';
    import AppLayout from '@/Layouts/AppLayout'
    import ReportCardBox from "../Components/Dashboard/Common/ReportCardBox";
    import LineChart from "../Components/Charts/LineChart";
    import DropdownButton from "../Components/Buttons/DropdownButton";
    import DropdownButtonItem from "../Components/Buttons/DropdownButtonItem";
    import PieChart from "../Components/Charts/PieChart";
    import DonutChart from "../Components/Charts/DonutChart";
    import LocationMap from "../Components/Dashboard/Common/LocationMap";
    import ImportantNoteSlider from "../Components/Dashboard/ImportantNoteSlider";
    import RecentActivities from "../Components/Dashboard/RecentActivities";
    import Transactions from "../Components/Dashboard/Transactions";
    import RecentOrders from "../Components/Dashboard/RecentOrders";

    export default {
        components: {
            RecentOrders,
            Transactions,
            RecentActivities,
            ImportantNoteSlider,
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
            MonitorIcon,
            UserIcon,
            ChevronDownIcon,
            MapPinIcon,
        },
        data() {
          return {
              reportLineChartData: {
                  firstData: [0, 300, 400, 560, 320, 600, 720, 850, 690, 805, 1200, 1010],
                  secondData: [0, 200, 250, 200, 500, 450, 850, 1050, 950, 1100, 900, 1200],
              },
              reportLineChartLabel: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
              weeklyTopSellData: [15, 10, 65],
              weeklyTopSellLabel: ["Yellow", "Dark"],
              reportDonutChartData: [15, 10, 65],
              reportDonutChartLabel: ["Yellow", "Dark"],
          }
        },
        methods: {
            myLog() {
                console.log(this.$page.props.user);
            }
        },
        mounted() {
            this.myLog();
        }
    }
</script>

<style scoped>

</style>
