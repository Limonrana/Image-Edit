<template>
<app-layout>
    <!-- BEGIN: Content -->
    <div class="orders">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-bold mr-auto">
                My Invoices
            </h2>
        </div>
        <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-6 custom-box">
                <div class="w-full">
                    <div class="flex mt-5 sm:mt-0">
                        <div class="w-full sm:flex items-center sm:mt-2 xl:mt-0">
                            <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto scrollbar-hidden">
                    <div class="table-report table-report--tabulator tabulator">
                        <custom-table>
                            <template #thead>
                                <table-head-item>INVOICE</table-head-item>
                                <table-head-item styles="text-align: center;">CREATED DATE</table-head-item>
                                <table-head-item styles="text-align: center;">DUE DATE</table-head-item>
                                <table-head-item styles="text-align: center;">TOTAL</table-head-item>
                                <table-head-item styles="text-align: center;">STATUS</table-head-item>
                                <table-head-item styles="text-align: center;">ACTIONS</table-head-item>
                            </template>
                            <template #tbody>
                                <template v-for="invoice in invoices.data">
                                    <table-item>
                                        <link-item href="#">#INV-{{ invoice.invoice_number }}</link-item>
                                        <simple-item>{{ invoice.created_at | moment('MMM D, YYYY') }}</simple-item>
                                        <simple-item>{{ invoice.due_date | moment('MMM D, YYYY') }}</simple-item>
                                        <simple-item>${{ parseFloat(invoice.total).toFixed(2) }}</simple-item>
                                        <status-icon-item :status-classes="statusClass(invoice.status)">{{ statusText(invoice.status) }}</status-icon-item>
                                        <actions-item :href1="route('user.invoice.show', invoice.invoice_number)">
                                            <template #btn-1>
                                                <check-square-icon size="1.5x" class="w-4 h-4 mr-1"></check-square-icon> View
                                            </template>
                                        </actions-item>
                                    </table-item>
                                </template>
                            </template>
                            <template #paginate>
                                <simple-paginate :links="invoices.links" />
                            </template>
                        </custom-table>
                    </div>
                </div>
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
import LinkItem from "../../Components/Table/Rows/LinkItem";
import SimpleItem from "../../Components/Table/Rows/SimpleItem";
import StatusIconItem from "../../Components/Table/Rows/StatusIconItem";
import ActionsItem from "../../Components/Table/Rows/ActionsItem";
import SimplePaginate from "../../Components/Table/SimplePaginate";

export default {
    name: "Invoices",
    props: ['invoices'],
    components: {
        SimplePaginate,
        ActionsItem,
        StatusIconItem,
        SimpleItem,
        LinkItem,
        OrderTabLink,
        TableItem,
        CustomTable,
        TableHeadItem,
        TableHead,
        AppLayout,
        CheckSquareIcon,
        Trash2Icon,
        PrinterIcon
    },
    computed: {
        statusText() {
            return status => {
                let result = null;
                if (status === 0) {
                    result = 'Unpaid';
                } else if (status === 1) {
                    result = 'Paid';
                } else if (status === 2) {
                    result = 'Cancelled';
                }
                return result;
            }
        },
        statusClass(status) {
            return status => {
                let result = null;
                if (status === 0) {
                    result = 'text-theme-24';
                } else if (status === 1) {
                    result = 'text-theme-10';
                } else if (status === 2) {
                    result = 'text-theme-33';
                }
                return result;
            }
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
    .col-cell-1 {
        width: 301px;
        display: inline-flex;
        align-items: center;
        height: 64px;
    }
</style>
