<template>
    <div class="intro-y box p-5 mt-6">
        <div class="mt-1">
            <inertia-link :href="route('user.files', { status: 'all' })" class="flex items-center px-3 py-2 rounded-md" :class="active === 'all' ? ' bg-theme-17 text-white font-medium' : ''">
                <GridIcon class="w-4 h-4 mr-2" size="1.5x"></GridIcon> All Files
            </inertia-link>
            <inertia-link :href="route('user.files', { status: 'images' })" class="flex items-center px-3 py-2 rounded-md" :class="active === 'images' ? ' bg-theme-17 text-white font-medium' : ''">
                <ImageIcon class="w-4 h-4 mr-2" size="1.5x"></ImageIcon> Images
            </inertia-link>
            <inertia-link :href="route('user.files', { status: 'zip' })" class="flex items-center px-3 py-2 mt-2 rounded-md" :class="active === 'zip' ? ' bg-theme-17 text-white font-medium' : ''">
                <FileIcon class="w-4 h-4 mr-2" size="1.5x"></FileIcon> Zip Files
            </inertia-link>
            <inertia-link :href="route('user.files', { status: 'trash' })" class="flex items-center px-3 py-2 mt-2 rounded-md" :class="active === 'trash' ? ' bg-theme-17 text-white font-medium' : ''">
                <TrashIcon class="w-4 h-4 mr-2" size="1.5x"></TrashIcon> Trash
            </inertia-link>
        </div>
    </div>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue";
import { GridIcon, ImageIcon, FileIcon, TrashIcon } from 'vue-feather-icons';

export default {
    name: "NavMenu",
    components: {InertiaLink, GridIcon, ImageIcon, FileIcon, TrashIcon},
    data() {
        return {
            active: 'all',
        }
    },
    mounted() {
        let queryString = window.location.search.split('=')[1];
        if (queryString !== undefined) {
            this.active = queryString;
        }
    }
}
</script>

<style scoped>

</style>
