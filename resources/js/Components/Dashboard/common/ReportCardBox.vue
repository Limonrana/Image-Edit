<template>
    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <slot></slot>
                </div>
                <div class="text-3xl font-medium leading-8 mt-6">{{ grossAmount }}</div>
                <div class="text-base text-gray-600 mt-1">{{ title }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ReportCardBox",
    props: ['title', 'grossAmount']
}
</script>

<style scoped>

</style>
