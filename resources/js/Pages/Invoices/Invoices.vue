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
                                <table-head-item styles="text-align: center;">DATE</table-head-item>
                                <table-head-item styles="text-align: center;">PAYMENT STATUS</table-head-item>
                                <table-head-item styles="text-align: center;">ORDER STATUS</table-head-item>
                                <table-head-item styles="text-align: center;">TOTAL</table-head-item>
                                <table-head-item styles="text-align: center;">ACTIONS</table-head-item>
                            </template>
                            <template #tbody>
                                <table-item id="1" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                                <table-item id="2" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                                <table-item id="3" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                                <table-item id="4" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                                <table-item id="5" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                                <table-item id="6" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                                <table-item id="7" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                                <table-item id="8" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                                <table-item id="9" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                                <table-item id="10" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#INV-128736</table-item>
                            </template>
                            <template #paginate>
                                <table-paginate></table-paginate>
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
import TablePaginate from "../../Components/Table/TablePaginate";
import OrderTabLink from "../../Components/NavLinks/OrderTabLink";
import { PrinterIcon } from 'vue-feather-icons';
export default {
    name: "Invoices",
    components: {OrderTabLink, TablePaginate, TableItem, CustomTable, TableHeadItem, TableHead, AppLayout, PrinterIcon}
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
