<template>
    <!-- BEGIN: Content -->
    <app-layout>
        <div class="OrderView">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Add New Post
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <div class="dropdown mr-2">
                    <button class="dropdown-toggle btn box text-gray-700 dark:text-gray-300 flex items-center" aria-expanded="false"> English <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
                    <div class="dropdown-menu w-40">
                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">English</span> </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">Indonesian</span> </a>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn box text-gray-700 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="eye"></i> Preview </button>
                <div class="dropdown">
                    <button class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false"> Save <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
                    <div class="dropdown-menu w-40">
                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> As New Post </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> As Draft </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Word </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Post Content -->
            <div class="intro-y col-span-12 lg:col-span-8">
                <div class="post intro-y overflow-hidden box mt-5">
                    <div class="post__tabs nav nav-tabs flex-col sm:flex-row bg-gray-300 dark:bg-dark-2 text-gray-600" role="tablist">
                        <a href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Content
                        </a>
                        <a href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                            <i data-feather="code" class="w-4 h-4 mr-2"></i> Meta Title
                        </a>
                        <a href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center">
                            <i data-feather="align-left" class="w-4 h-4 mr-2"></i> Keywords
                        </a>
                    </div>
                    <div class="post__content tab-content">
                        <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Text Content </div>
                                <div class="mt-5">
                                    <div class="editor">
                                        <p>Content of the editor.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Caption & Images </div>
                                <div class="mt-5">
                                    <div>
                                        <label for="post-form-7" class="form-label">Caption</label>
                                        <input id="post-form-7" type="text" class="form-control" placeholder="Write caption">
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Upload Image</label>
                                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                                            <div class="flex flex-wrap px-4">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md" alt="Icewall Tailwind HTML Admin Template" src="dist/images/preview-13.jpg">
                                                    <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-24 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                                </div>
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md" alt="Icewall Tailwind HTML Admin Template" src="dist/images/preview-1.jpg">
                                                    <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-24 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                                </div>
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md" alt="Icewall Tailwind HTML Admin Template" src="dist/images/preview-1.jpg">
                                                    <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-24 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                                </div>
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md" alt="Icewall Tailwind HTML Admin Template" src="dist/images/preview-6.jpg">
                                                    <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-24 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative dark:text-gray-500">
                                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span class="text-theme-1 dark:text-gray-300 mr-1">Upload a file</span> or drag and drop
                                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Content -->
            <!-- BEGIN: Post Info -->
            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box p-5">
                    <div class="form-check flex-col items-start mt-3">
                        <label for="post-form-5" class="form-check-label ml-0 mb-2">Published</label>
                        <input id="post-form-5" class="form-check-switch" type="checkbox">
                    </div>
                    <div class="form-check flex-col items-start mt-3">
                        <label for="post-form-6" class="form-check-label ml-0 mb-2">Show Author Name</label>
                        <input id="post-form-6" class="form-check-switch" type="checkbox">
                    </div>
                </div>
            </div>
            <!-- END: Post Info -->
        </div>
    </div>
    </app-layout>
    <!-- END: Content -->
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";

export default {
    name: "OrderView",
    components: {AppLayout},
}
</script>

<style scoped>

</style>
