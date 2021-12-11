<template>
<app-layout>
    <!-- BEGIN: Content -->
    <div class="orders">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                My Orders
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <inertia-link :href="route('user.orders.create')" class="btn btn-primary shadow-md mr-2">Create New Order</inertia-link>
            </div>
        </div>
        <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-5 custom-box">
                <order-tab-link>
                    <div class="w-full">
                        <div class="flex mt-5 sm:mt-0">
                            <div class="w-full ml-2 sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                <input id="tabulator-html-filter-value" type="text" v-model="form.search" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
                            </div>
                            <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2" @click="printer">
                                <printer-icon size="1.5x" class="w-4 h-4 mr-2"></printer-icon> Print
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto scrollbar-hidden">
                        <div class="table-report table-report--tabulator tabulator">
                            <template v-if="orders.data.length > 0">
                                <custom-table>
                                    <template #thead>
                                        <table-head-item>ORDER</table-head-item>
                                        <table-head-item styles="text-align: center;">DATE</table-head-item>
                                        <table-head-item styles="text-align: center;">PAYMENT METHOD</table-head-item>
                                        <table-head-item styles="text-align: center;">PAYMENT STATUS</table-head-item>
                                        <table-head-item styles="text-align: center;">STATUS</table-head-item>
                                        <table-head-item styles="text-align: center;">TOTAL</table-head-item>
                                        <table-head-item styles="text-align: center;">ACTIONS</table-head-item>
                                    </template>
                                    <template #tbody>
                                        <table-item v-for="order in orders.data" :key="order.id">
                                            <link-item :href="route('user.orders.show', order.order_number)">
                                                #{{ order.order_number }}
                                            </link-item>
                                            <simple-item>{{ order.created_at | moment('MMM D, YYYY') }}</simple-item>
                                            <simple-item>{{ order.payment_method }}</simple-item>
                                            <simple-item>{{ order.payment_status }}</simple-item>
                                            <status-icon-item :status-classes="statusClass(order.status)">
                                                {{ statusText(order.status) }}
                                            </status-icon-item>
                                            <simple-item>${{ parseFloat(order.total).toFixed(2) }}</simple-item>
                                            <actions-item :href1="route('user.orders.show', order.order_number)">
                                                <template #btn-1>
                                                    <check-square-icon size="1.5x" class="w-4 h-4 mr-1"></check-square-icon> View
                                                </template>
                                            </actions-item>
                                        </table-item>
                                    </template>
                                    <template #paginate>
                                        <custom-paginate :links="orders.links" :path="orders.path" :query-string="query_string" />
                                    </template>

                                </custom-table>
                            </template>
                            <template v-else>
                                <empty-state title="OOPS! Your order has been empty" description="Get started by creating a new order." />
                            </template>
                        </div>
                    </div>
                </order-tab-link>
            </div>
        <!-- END: HTML Table Data -->
    </div>
    <!-- END: Content -->
</app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import TableHead from "../../Components/Table/TableHead";
import TableHeadItem from "../../Components/Table/TableHeadItem";
import CustomTable from "../../Components/Table/CustomTable";
import TableItem from "../../Components/Table/TableItem";
import OrderTabLink from "../../Components/NavLinks/OrderTabLink";
import { PrinterIcon, CheckSquareIcon, Trash2Icon } from 'vue-feather-icons';
import {InertiaLink} from "@inertiajs/inertia-vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import CustomPaginate from "../../Components/Table/CustomPaginate";
import LinkItem from "../../Components/Table/Rows/LinkItem";
import SimpleItem from "../../Components/Table/Rows/SimpleItem";
import ActionsItem from "../../Components/Table/Rows/ActionsItem";
import StatusIconItem from "../../Components/Table/Rows/StatusIconItem";
import EmptyState from "../../Components/Common/EmptyState";

export default {
    name: "Orders",
    props: ['orders', 'query_string'],
    components: {
        EmptyState,
        StatusIconItem,
        ActionsItem,
        SimpleItem,
        LinkItem,
        CustomPaginate,
        OrderTabLink,
        TableItem,
        CustomTable,
        TableHeadItem,
        TableHead,
        AppLayout,
        PrinterIcon,
        CheckSquareIcon,
        Trash2Icon,
        InertiaLink
    },
    data() {
        return {
            form: {
                search: '',
            },
        }
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function() {
                this.$inertia.get(route('user.orders', { status: this.query_string }), pickBy(this.form), { preserveState: true })
            }, 1000),
        },
    },
    computed: {
        statusText() {
            return status => {
                let result = null;
                if (status === 0) {
                    result = 'UnderReview';
                } else if (status === 1) {
                    result = 'Open';
                } else if (status === 2) {
                    result = 'Delivered';
                } else if (status === 3) {
                    result = 'Completed';
                } else if (status === 4) {
                    result = 'Cancelled';
                }
                return result;
            }
        },
        statusClass() {
            return status => {
                let result = null;
                if (status === 0) {
                    result = 'text-theme-33';
                } else if (status === 1) {
                    result = 'text-theme-10';
                } else if (status === 2) {
                    result = 'text-theme-10';
                } else if (status === 3) {
                    result = 'text-theme-10';
                } else if (status === 4) {
                    result = 'text-theme-24';
                }
                return result;
            }
        }
    },
    methods: {
        printer() {
            window.print();
        }
    }
}
</script>

<style scoped>
    .custom-box {
        border-radius: 15px !important;
        background-color: #ffffff6e !important;
    }
    .dark .custom-box {
        --tw-bg-opacity: 1 !important;
        background-color: rgba(49, 58, 85, var(--tw-bg-opacity)) !important;
    }
</style>
