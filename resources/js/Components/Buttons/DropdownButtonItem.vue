<template>
    <inertia-link :href="href" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
        <slot></slot>
    </inertia-link>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "DropdownButtonItem",
    props: ['href'],
    components: {InertiaLink}
}
</script>

<style scoped>

</style>
