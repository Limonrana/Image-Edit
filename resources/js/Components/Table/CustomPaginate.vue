<template>
    <div v-if="links.length > 3">
        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
            <ul class="pagination">
                <template v-for="link in links">
                    <li v-if="link.label === 'Next &raquo;' || link.label === '&laquo; Previous'">
                        <inertia-link class="pagination__link" :href="`${path}?status=${queryString}&page=${link.label}`" v-if="link.url !== null">
                            <chevrons-left-icon size="1.5x" class="w-4 h-4" v-if="link.label === '&laquo; Previous'"></chevrons-left-icon>
                            <chevrons-right-icon size="1.5x" class="w-4 h-4" v-else></chevrons-right-icon>
                        </inertia-link>
                        <button class="pagination__link" v-else disabled>
                            <chevrons-left-icon size="1.5x" class="w-4 h-4" v-if="link.label === '&laquo; Previous'"></chevrons-left-icon>
                            <chevrons-right-icon size="1.5x" class="w-4 h-4" v-else></chevrons-right-icon>
                        </button>
                    </li>
                    <li v-else>
                        <inertia-link :href="`${path}?status=${queryString}&page=${link.label}`" class="pagination__link" :class="{ 'pagination__link--active' : link.active }">{{ link.label }}</inertia-link>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue";
import { ChevronsLeftIcon, ChevronsRightIcon } from 'vue-feather-icons';

export default {
    name: "CustomPaginate",
    props: ["links", "path", "queryString"],
    components: { ChevronsLeftIcon, ChevronsRightIcon, InertiaLink }
}
</script>

<style scoped>
    .pagination__link:hover {
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
    }
    .dark .pagination li .pagination__link.pagination__link--active {
        background-color: #ffffff14 !important;
    }
    .dark .pagination li .pagination__link:hover {
        background-color: #ffffff14 !important;
    }
</style>
