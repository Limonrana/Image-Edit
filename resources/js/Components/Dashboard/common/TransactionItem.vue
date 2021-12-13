<template>
    <div class="intro-x">
        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
            <div class="w-10 h-10 flex items-center">
                <file-icon size="2.5x" />
            </div>
            <div class="ml-4 mr-auto">
                <inertia-link :href="route('user.invoice.show', invoiceNumber)">
                    <div class="font-medium">#INV-{{ invoiceNumber }}</div>
                    <div class="text-gray-600 text-xs mt-0.5">{{ date | moment('MMM D, YYYY') }}</div>
                </inertia-link>
            </div>
            <div class="text-theme-24" v-if="isFailed">-${{ parseFloat(amount).toFixed(2) }}</div>
            <div class="text-theme-10" v-else>+${{ parseFloat(amount).toFixed(2) }}</div>
        </div>
    </div>
</template>

<script>
import { FileIcon } from 'vue-feather-icons';
import {InertiaLink} from "@inertiajs/inertia-vue";

export default {
    name: "TransactionItem",
    props: ['invoiceNumber', 'date', 'amount', 'isFailed'],
    components: {FileIcon, InertiaLink},
}
</script>

<style scoped>

</style>
