<template>
    <inertia-link :href="src" class="flex items-center" :class="getClasses">
        <slot></slot> {{ title }}
    </inertia-link>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "SideNavItem",
    props: ['src', 'title', 'active', 'classes'],
    components: {InertiaLink},
    computed: {
        getClasses() {
            return this.active ? `text-theme-17 dark:text-gray-300 font-medium ${this.classes !== undefined ? this.classes : ''}` : `${this.classes ?? this.classes}`;
        }
    }
}
</script>

<style scoped>

</style>
