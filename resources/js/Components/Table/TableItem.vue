<template>
    <tr class="intro-x">
        <td>
            <inertia-link :href="route('dashboard')" class="font-medium whitespace-nowrap">
                <slot></slot>
            </inertia-link>
        </td>
        <td class="text-center">{{ date }}</td>
        <td class="text-center" v-if="isPaid">
            <div class="flex items-center justify-center" :class="isPaid ? 'text-theme-10' : 'text-theme-24'">
                <check-square-icon size="1.5x" class="w-4 h-4 mr-2"></check-square-icon> {{ isPaid ? 'Paid' : 'Unpaid' }}
            </div>
        </td>
        <td class="text-center" v-else>{{ service }}</td>
        <td class="w-40" v-if="!service">
            <div class="flex items-center justify-center" :class="statusClass" v-if="isPaid">
                <check-square-icon size="1.5x" class="w-4 h-4 mr-2"></check-square-icon> {{ statusText }}
            </div>
            <div class="flex items-center justify-center text-theme-23" v-else>
                <check-square-icon size="1.5x" class="w-4 h-4 mr-2"></check-square-icon> Pending
            </div>
        </td>
        <td class="w-40" v-else>
            <div class="flex items-center justify-center" :class="statusClass">
                <check-square-icon size="1.5x" class="w-4 h-4 mr-2"></check-square-icon> {{ statusText }}
            </div>
        </td>
        <td class="text-center">${{ total }}</td>
        <td class="table-report__action w-56">
            <div class="flex justify-center items-center">
                <inertia-link class="flex items-center mr-3" :href="route('dashboard')">
                    <check-square-icon size="1.5x" class="w-4 h-4 mr-1"></check-square-icon> Edit
                </inertia-link>
                <inertia-link class="flex items-center text-theme-24" :href="route('dashboard')">
                    <trash2-icon size="1.5x" class="w-4 h-4 mr-1"></trash2-icon> Delete
                </inertia-link>
            </div>
        </td>
    </tr>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";
import { CheckSquareIcon, Trash2Icon } from 'vue-feather-icons';
export default {
    name: "TableItem",
    props: ['id', 'date', 'total', 'service', 'isPaid', 'status'],
    components: {InertiaLink, CheckSquareIcon, Trash2Icon},
    computed: {
        statusText() {
            let result = null;
            if (this.status === 0) {
                result = 'Processing';
            } else if (this.status === 1) {
                result = 'Delivered';
            } else if (this.status === 2) {
                result = 'Completed';
            } else {
                result = 'Cancelled';
            }
            return result;
        },
        statusClass() {
            let result = null;
            if (this.status === 0) {
                result = 'text-theme-10';
            } else if (this.status === 1) {
                result = 'text-theme-33';
            } else if (this.status === 2) {
                result = 'text-theme-10';
            } else {
                result = 'text-theme-24';
            }
            return result;
        }
    }
}
</script>

<style scoped>
    .col-cell-1 {
        width: 301px;
        display: inline-flex;
        align-items: center;
        height: 64px;
    }
</style>
