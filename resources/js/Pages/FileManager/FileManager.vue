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
                <search-filter></search-filter>
                <!-- END: File Manager Filter -->
                <!-- BEGIN: Directory & Files -->
                <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                    <file-item id="1" size="1 MB" src="../../images/preview-9.jpg">preview-9.jpg</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB" src="../../images/preview-9.jpg">preview-9.jpg</file-item>
                    <file-item id="1" size="1 MB" src="../../images/preview-9.jpg">preview-9.jpg</file-item>
                    <file-item id="1" size="1 MB" src="../../images/preview-9.jpg">preview-9.jpg</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB" src="../../images/preview-9.jpg">preview-9.jpg</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB" src="../../images/preview-9.jpg">preview-9.jpg</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB" src="../../images/preview-9.jpg">preview-9.jpg</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB">image-1.zip</file-item>
                    <file-item id="1" size="1 MB" src="../../images/preview-9.jpg">preview-9.jpg</file-item>
                </div>
                <!-- END: Directory & Files -->
                <!-- BEGIN: Pagination -->
                <file-paginate></file-paginate>
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
import SearchFilter from "../../Components/FileManager/SearchFilter";
import FileItem from "../../Components/FileManager/FileItem";
import FilePaginate from "../../Components/FileManager/FilePaginate";
export default {
    name: "FileManager",
    components: {FilePaginate, FileItem, SearchFilter, NavMenu, AppLayout}
}
</script>

<style scoped>

</style>
