<template>
    <div class="flex items-center relative" :class="mt ? 'mt-5' : ''">
        <div class="file">
            <div class="w-12 file__icon file__icon--directory" v-if="src === 'file'"></div>
            <div class="w-12 file__icon" v-else>
                <img :src="src" alt="preview" style="margin-top: -48px;" />
            </div>
        </div>
        <div class="ml-4">
            <div class="font-medium">
                <slot></slot>
            </div>
            <div class="text-gray-600 text-xs mt-0.5">{{ size }}</div>
        </div>
        <div class="dropdown ml-auto">
            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" @click="handleDropDown">
                <MoreHorizontalIcon size="1.5x" class="w-5 h-5 text-gray-600 dark:text-gray-300"></MoreHorizontalIcon>
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
</template>

<script>
import { MoreHorizontalIcon, TrashIcon, DownloadIcon } from 'vue-feather-icons';
export default {
    name: "UploadItem",
    props: ['id', 'size', 'src', 'mt'],
    components: {MoreHorizontalIcon, TrashIcon, DownloadIcon},
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
        margin: 0px;
        transform: translate(0, 0);
        top: 62%;
        left: 75%;
    }
</style>
