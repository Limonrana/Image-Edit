<template>
    <inertia-link :href="href" class="flex items-center mt-2">
        <div class="w-8 h-8 flex items-center justify-center rounded-full" :class="classes">
            <slot></slot>
        </div>
        <div class="ml-3">{{ title }}</div>
        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right" v-if="isType === 'quotation'">
            {{ subTitle }}
        </div>
    </inertia-link>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "SearchBoxItem",
    props: ['href', 'title', 'subTitle', 'isType'],
    components: {InertiaLink},
    computed: {
        classes() {
            let result = null;
            if (this.isType === 'order') {
                result = 'bg-theme-29 text-theme-10';
            } else if (this.isType === 'invoice') {
                result = 'bg-theme-31 text-theme-26';
            } else {
                result = 'bg-theme-30 text-theme-24';
            }
            return result;
        }
    }
}
</script>

<style scoped>

</style>
