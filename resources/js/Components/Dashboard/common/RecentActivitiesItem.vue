<template>
    <div class="intro-x relative flex items-center mb-3">
        <div class="report-timeline__image">
            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                <img alt="Icewall Tailwind HTML Admin Template" :src="src">
            </div>
        </div>
        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
            <div class="flex items-center">
                <div class="font-medium">{{ name }}</div>
                <div class="text-xs text-gray-500 ml-auto">{{ time }}</div>
            </div>
            <div class="text-gray-600 mt-1">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RecentActivitiesItem",
    props: ['name', 'time', 'src'],
}
</script>

<style scoped>

</style>
