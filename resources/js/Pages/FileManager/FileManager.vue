<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="file-manager">
            <div class="grid grid-cols-12 gap-6 mt-8">
            <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
                <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                    File Manager
                </h2>
                <!-- BEGIN: File Manager Menu -->
                <nav-menu></nav-menu>
                <!-- END: File Manager Menu -->
            </div>
            <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
                <!-- BEGIN: File Manager Filter -->
                <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                    <div class="w-full sm:relative mr-auto mt-3 sm:mt-0">
                        <SearchIcon class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300" size="1.5x"></SearchIcon>
                        <input type="text" class="form-control w-full sm:box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-8" v-model="form.search" placeholder="Search files">
                    </div>
                </div>
                <!-- END: File Manager Filter -->
                <!-- BEGIN: Directory & Files -->
                <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                    <template v-for="file in files.data">
                        <file-item :id="file.id" :size="`${(file.size / 1000000).toFixed(2)} MB`" :name="file.name" :src="`/${file.path}`" @download="fileDownload">{{ file.name }}</file-item>
                    </template>
<!--                    <file-item id="1" size="1 MB">image-1.zip</file-item>-->
                </div>
                <!-- END: Directory & Files -->
                <!-- BEGIN: Pagination -->
                <custom-paginate :links="files.links" :path="files.path" :query-string="query_string" />
                <!-- END: Pagination -->
            </div>
        </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import NavMenu from "../../Components/FileManager/NavMenu";
import FileItem from "../../Components/FileManager/FileItem";
import { SearchIcon } from 'vue-feather-icons';
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import CustomPaginate from "../../Components/Table/CustomPaginate";

export default {
    name: "FileManager",
    props: ['files', 'query_string'],
    components: {CustomPaginate, FileItem, NavMenu, SearchIcon, AppLayout},
    data() {
        return {
            form: {
                search: '',
            },
        }
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function() {
                this.$inertia.get(route('user.files', { status: this.query_string }), pickBy(this.form), { preserveState: true })
            }, 2000),
        },
    },
    methods: {
        fileDownload(id, name) {
            axios({
                url: route('user.files.download', id),
                method: 'GET',
                responseType: 'blob',
            }).then((response) => {
                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                var fileLink = document.createElement('a');

                fileLink.href = fileURL;
                fileLink.setAttribute('download', name);
                document.body.appendChild(fileLink);
                fileLink.click();
            });
        }
    }
}
</script>

<style scoped>

</style>
