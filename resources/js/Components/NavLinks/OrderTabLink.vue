<template>
<!--    <div>-->
<!--        <ul class="flex items-center mt-4 mb-2" style="border-bottom: 0.1rem solid rgba(225, 227, 229, 1);">-->
<!--            <li class="cursor-pointer py-3 px-4 rounded transition text-gray-500"-->
<!--                :class="active === 'all' ? 'btn-primary tab-active' : ' text-gray-500 tab-inactive'" style="margin-left: 0;">-->
<!--                All-->
<!--            </li>-->
<!--            <li class="cursor-pointer py-3 px-4 rounded transition text-gray-500"-->
<!--                :class="active === 'open' ? 'btn-primary tab-active' : ' text-gray-500 tab-inactive'">-->
<!--                Open-->
<!--            </li>-->
<!--            <li class="cursor-pointer py-3 px-4 rounded transition text-gray-500"-->
<!--                :class="active === 'unpaid' ? 'btn-primary tab-active' : ' text-gray-500 tab-inactive'">-->
<!--                Unpaid-->
<!--            </li>-->
<!--            <li class="cursor-pointer py-3 px-4 rounded transition text-gray-500"-->
<!--                :class="active === 'delivered' ? 'btn-primary tab-active' : ' text-gray-500 tab-inactive'">-->
<!--                Delivered-->
<!--            </li>-->
<!--            <li class="cursor-pointer py-3 px-4 rounded transition text-gray-500"-->
<!--                :class="active === 'completed' ? 'btn-primary tab-active' : ' text-gray-500 tab-inactive'">-->
<!--                Completed-->
<!--            </li>-->
<!--        </ul>-->

<!--        <div class="w-full text-center mx-auto">-->
<!--            <slot></slot>-->
<!--        </div>-->
<!--    </div>-->

    <!-- BEGIN: Tab Info -->
    <div>
        <div class="intro-y box px-5 border-b border-gray-200 dark:border-dark-5">
            <div class="nav nav-tabs flex-col sm:flex-row justify-center lg:justify-start">
                <inertia-link :href="route('user.orders', { status: 'all' })" class="py-4 sm:mr-8 flex items-center tab-1" :class="active === 'all' ? 'active' : ''">
                    <grid-icon size="1.5x" class="w-4 h-4 mr-2"></grid-icon> All Orders
                </inertia-link>

                <inertia-link :href="route('user.orders', { status: 'open' })" class="py-4 sm:mr-8 flex items-center tab-2" :class="active === 'open' ? 'active' : ''">
                    <monitor-icon size="1.5x" class="w-4 h-4 mr-2"></monitor-icon> Open
                </inertia-link>

                <inertia-link :href="route('user.orders', { status: 'unpaid' })" class="py-4 sm:mr-8 flex items-center tab-3" :class="active === 'unpaid' ? 'active' : ''">
                    <alert-circle-icon size="1.5x" class="w-4 h-4 mr-2"></alert-circle-icon> Unpaid
                </inertia-link>

                <inertia-link :href="route('user.orders', { status: 'delivered' })" class="py-4 sm:mr-8 flex items-center tab-4" :class="active === 'delivered' ? 'active' : ''">
                    <truck-icon size="1.5x" class="w-4 h-4 mr-2"></truck-icon> Delivered
                </inertia-link>

                <inertia-link :href="route('user.orders', { status: 'completed' })" class="py-4 sm:mr-8 flex items-center tab-5" :class="active === 'completed' ? 'active' : ''">
                    <lock-icon size="1.5x" class="w-4 h-4 mr-2"></lock-icon> Completed
                </inertia-link>

                <inertia-link :href="route('user.orders', { status: 'cancelled' })" class="py-4 sm:mr-8 flex items-center tab-6" :class="active === 'cancelled' ? 'active' : ''">
                    <x-circle-icon size="1.5x" class="w-4 h-4 mr-2"></x-circle-icon> Cancelled
                </inertia-link>
            </div>
        </div>
        <div class="tab-content pt-2">
            <div class="tab-pane active">
                <slot></slot>
            </div>
        </div>
        <!-- END: Tab Info -->
    </div>
</template>

<script>
import { GridIcon, MonitorIcon, AlertCircleIcon, XCircleIcon, TruckIcon, LockIcon } from 'vue-feather-icons';
import { InertiaLink } from '@inertiajs/inertia-vue';
export default {
    name: "OrderTabLink",
    components: {InertiaLink, GridIcon, MonitorIcon, AlertCircleIcon, XCircleIcon, TruckIcon, LockIcon},
    data() {
        return {
            active: 'all',
        }
    },
    mounted() {
        let queryString = window.location.search.split('=')[1];
        if (queryString !== undefined) {
            this.active = queryString;
        }
    }
}
</script>

<style scoped>
    .tab-content {
        background: #ffffffbf;
    }
    .tab-1, .tab-2, .tab-3, .tab-4, .tab-5, .tab-6 {
        padding: 0.8rem 0.4rem;
        border-bottom-width: 2px;
        border-color: #fff;
    }
    .tab-1:hover, .tab-2:hover, .tab-3:hover, .tab-4:hover, .tab-5:hover, .tab-6:hover {
        border-bottom-width: 2px;
        border-color: gray;
        /*font-weight: 500;*/
    }
</style>
