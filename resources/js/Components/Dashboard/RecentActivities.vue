<template>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
        <div class="intro-x flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Recent Activities
            </h2>
        </div>
        <div class="report-timeline mt-5 relative">
            <slot />
        </div>
    </div>
</template>

<script>
import RecentActivitiesItem from "./common/RecentActivitiesItem";

export default {
    name: "RecentActivities",
    components: {RecentActivitiesItem}
}
</script>

<style scoped>

</style>
