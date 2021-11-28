<template>
    <div class="intro-x">
        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                <img :alt="invoiceNumber" :src="src">
            </div>
            <div class="ml-4 mr-auto">
                <div class="font-medium">#{{ invoiceNumber }}</div>
                <div class="text-gray-600 text-xs mt-0.5">{{ date }}</div>
            </div>
            <div class="text-theme-24" v-if="isFailed">-${{ amount }}</div>
            <div class="text-theme-10" v-else>+${{ amount }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TransactionItem",
    props: ['invoiceNumber', 'date', 'amount', 'isFailed', 'src']
}
</script>

<style scoped>

</style>
