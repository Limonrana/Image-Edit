<template>
    <inertia-link :href="href" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
        <slot></slot> {{ title }}
    </inertia-link>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";
export default {
    name: "SimpleIconNav",
    props: ['href', 'title'],
    components: {InertiaLink}
}
</script>

<style scoped>

</style>
