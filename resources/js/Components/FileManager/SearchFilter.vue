<template>
    <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
        <div class="w-full sm:relative mr-auto mt-3 sm:mt-0">
            <SearchIcon class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300" size="1.5x"></SearchIcon>
            <input type="text" class="form-control w-full sm:box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-8" placeholder="Search files">
        </div>
    </div>
</template>

<script>
import { SearchIcon } from 'vue-feather-icons';
export default {
    name: "SearchFilter",
    components: {SearchIcon},
}
</script>

<style scoped>

</style>
