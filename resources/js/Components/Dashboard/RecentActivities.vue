<template>
    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
        <div class="intro-x flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Recent Activities
            </h2>
            <inertia-link :href="route('user.dashboard')" class="ml-auto text-theme-26 dark:text-theme-33 truncate">Show More</inertia-link>
        </div>
        <div class="report-timeline mt-5 relative">
            <div class="intro-x text-gray-500 text-xs text-center my-4">{{ new Date() | moment("D MMMM") }}</div>
            <recent-activities-item :name="$page.props.user.name" time="06:51 AM" :src="$page.props.user.profile_photo_url">
                Completed an new order <a class="text-theme-26 dark:text-theme-33" href="">#INV-1928328</a>
            </recent-activities-item>

            <recent-activities-item :name="$page.props.user.name" time="05:19 AM" :src="$page.props.user.profile_photo_url">
                Delivered an new order <a class="text-theme-26 dark:text-theme-33" href="">#INV-1928328</a>
            </recent-activities-item>

            <recent-activities-item :name="$page.props.user.name" time="03:09 AM" :src="$page.props.user.profile_photo_url">
                Created an new order <a class="text-theme-26 dark:text-theme-33" href="">#INV-1928328</a>
            </recent-activities-item>

            <div class="intro-x text-gray-500 text-xs text-center my-4">12 November</div>

            <recent-activities-item :name="$page.props.user.name" time="06:51 PM" :src="$page.props.user.profile_photo_url">
                Completed an new order <a class="text-theme-26 dark:text-theme-33" href="">#INV-1928327</a>
            </recent-activities-item>

            <recent-activities-item :name="$page.props.user.name" time="05:19 PM" :src="$page.props.user.profile_photo_url">
                Delivered an new order <a class="text-theme-26 dark:text-theme-33" href="">#INV-1928327</a>
            </recent-activities-item>

            <recent-activities-item :name="$page.props.user.name" time="03:09 PM" :src="$page.props.user.profile_photo_url">
                Created an new order <a class="text-theme-26 dark:text-theme-33" href="">#INV-1928327</a>
            </recent-activities-item>
        </div>
    </div>
</template>

<script>
import RecentActivitiesItem from "./common/RecentActivitiesItem";
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "RecentActivities",
    components: {RecentActivitiesItem, InertiaLink}
}
</script>

<style scoped>

</style>
