<template>
    <div class="col-span-12 mt-6">
        <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Recent Orders
            </h2>
            <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                    <shopping-cart-icon size="1.5x" class="hidden sm:block w-4 h-4 mr-2"></shopping-cart-icon> My orders
                </button>
            </div>
        </div>
        <div class="mt-2">
            <custom-table>
                <template #thead>
                    <table-head-item>ORDER</table-head-item>
                    <table-head-item styles="text-align: center;">DATE</table-head-item>
                    <table-head-item styles="text-align: center;">PAYMENT STATUS</table-head-item>
                    <table-head-item styles="text-align: center;">STATUS</table-head-item>
                    <table-head-item styles="text-align: center;">TOTAL</table-head-item>
                    <table-head-item styles="text-align: center;">ACTIONS</table-head-item>
                </template>
                <template #tbody>
                    <table-item id="1" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#ORD-128736</table-item>
                    <table-item id="2" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#ORD-128736</table-item>
                    <table-item id="3" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#ORD-128736</table-item>
                    <table-item id="4" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#ORD-128736</table-item>
                    <table-item id="5" date="Aug 25, 2020" total="232" :is-paid="true" :status="0">#ORD-128736</table-item>
                </template>
            </custom-table>
        </div>
    </div>
</template>

<script>
import { ShoppingCartIcon, ChevronsLeftIcon, ChevronsRightIcon } from 'vue-feather-icons';
import RecentOrderItem from "./common/RecentOrderItem";
import CustomTable from "../Table/CustomTable";
import TableHead from "../Table/TableHead";
import TableHeadItem from "../Table/TableHeadItem";
import TableItem from "../Table/TableItem";
import TablePaginate from "../Table/TablePaginate";
export default {
    name: "RecentOrders",
    components: {
        RecentOrderItem,
        ShoppingCartIcon,
        ChevronsLeftIcon,
        ChevronsRightIcon,
        CustomTable,
        TableHead,
        TableHeadItem,
        TableItem,
        TablePaginate,
    }
}
</script>

<style scoped>
    .pagination__link:hover {
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
    }
</style>
