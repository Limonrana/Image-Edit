<template>
    <div class="intro-y box col-span-12 lg:col-span-6">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                {{ title }}
            </h2>
            <div class="dropdown ml-auto sm:hidden">
                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2"> <a href="javascript:;" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">All Files</a> </div>
                </div>
            </div>
            <inertia-link :href="route('user.orders', {status: 'all'})" class="btn btn-outline-secondary hidden sm:flex">All Files</inertia-link>
        </div>
        <div class="p-5">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue";

export default {
    name: "Uploads",
    props: ['title'],
    components: {InertiaLink}
}
</script>

<style scoped>

</style>
