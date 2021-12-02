<template>
    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
        <div class="file box rounded-md px-5 pt-8 pb-5 px-3 relative sm:px-5 zoom-in">
            <div class="absolute left-0 top-0 mt-3 ml-3">
                <input class="form-check-input border border-gray-500" type="checkbox">
            </div>
            <div class="w-3/5 file__icon file__icon--image mx-auto" v-if="src !== undefined">
                <div class="file__icon--image__preview image-fit">
                    <img alt="preview" :src="src">
                </div>
            </div>
            <div class="w-3/5 file__icon file__icon--directory mx-auto" v-else></div>
            <div class="block font-medium mt-4 text-center truncate">
                <slot></slot>
            </div>
            <div class="text-gray-600 text-xs text-center mt-0.5">{{ size }}</div>
            <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" @click="handleDropDown">
                    <MoreVerticalIcon size="1.5x" class="w-5 h-5 text-gray-600"></MoreVerticalIcon>
                </a>
                <div class="dropdown-menu w-40" :class="isOpen ? 'show my-dropdown-show' : 'hidden'">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <DownloadIcon size="1.5x" class="w-4 h-4 mr-2"></DownloadIcon> Download
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <TrashIcon size="1.5x" class="w-4 h-4 mr-2"></TrashIcon> Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { MoreVerticalIcon, TrashIcon, DownloadIcon } from 'vue-feather-icons';
export default {
    name: "FileItem",
    props: ['id', 'size', 'src'],
    components: {MoreVerticalIcon, TrashIcon, DownloadIcon},
    data() {
        return {
            isOpen: false,
        }
    },
    methods: {
        handleDropDown() {
            this.isOpen = !this.isOpen;
        },
    }
}
</script>

<style scoped>
    .my-dropdown-show {
        width: 160px;
        position: absolute;
        inset: 0;
        margin: 0;
        transform: translate(0, 0);
        top: 100%;
        left: -725%;
    }
</style>
