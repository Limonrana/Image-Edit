<template>
    <div class="intro-y">
        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
            <div class="w-10 h-10 flex items-center">
                <shopping-bag-icon size="2.5x" />
            </div>
            <div class="ml-4 mr-auto">
                <div class="font-medium">#ORDER-{{ orderNumber }}</div>
                <div class="text-gray-600 text-xs mt-0.5">{{ date | moment('MMM D, YYYY') }}</div>
            </div>
            <div class="py-1 px-2 rounded-full text-xs text-white cursor-pointer font-medium" :class="isPaid === 'Paid' ? 'bg-theme-10' : 'bg-theme-24'">
                {{ isPaid }}
            </div>
        </div>
    </div>
</template>

<script>
import { ShoppingBagIcon } from 'vue-feather-icons';
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "RecentOrderItem",
    props: ['orderNumber', 'date', 'isPaid'],
    components: {ShoppingBagIcon, InertiaLink},
    computed: {

    }
}
</script>

<style scoped>

</style>
