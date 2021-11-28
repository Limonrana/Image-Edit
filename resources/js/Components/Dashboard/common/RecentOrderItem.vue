<template>
    <tr class="intro-x">
        <td class="text-center">{{ id }}.</td>
        <td>
            <inertia-link :href="route('dashboard')" class="font-medium whitespace-nowrap">
                <slot></slot>
            </inertia-link>
        </td>
        <td class="text-center">{{ date }}</td>
        <td class="text-center">
            <div class="flex items-center justify-center" :class="isPaid ? 'text-theme-10' : 'text-theme-24'">
                <check-square-icon size="1.5x" class="w-4 h-4 mr-2"></check-square-icon> {{ isPaid ? 'Paid' : 'Unpaid' }}
            </div>
        </td>
        <td class="w-40">
            <div class="flex items-center justify-center" :class="statusClass" v-if="isPaid">
                <check-square-icon size="1.5x" class="w-4 h-4 mr-2"></check-square-icon> {{ statusText }}
            </div>
            <div class="flex items-center justify-center text-theme-23" v-else>
                <check-square-icon size="1.5x" class="w-4 h-4 mr-2"></check-square-icon> Pending
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
import { CheckSquareIcon, Trash2Icon } from 'vue-feather-icons';
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "RecentOrderItem",
    props: ['id', 'date', 'total', 'isPaid', 'status'],
    components: {CheckSquareIcon, Trash2Icon, InertiaLink},
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

</style>
