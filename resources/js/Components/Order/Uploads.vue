<template>
    <div class="intro-y col-span-12 lg:col-span-4 -mt-4">
        <!-- BEGIN: Multiple File Upload -->
        <div class="intro-y min-h-100 max-h-full box mt-5 overflow-y" :class="isSticky ? 'is_sticky' : ''">
            <vue2-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" :duplicateCheck="true" :useCustomSlot="true">
                <div class="dropzone-custom-content">
                    <upload-cloud-icon class="" size="4x" />
                    <div class="text-lg font-medium">Drop files here or click to upload.</div>
                    <div class="text-gray-600"> This is just a demo dropzone. Selected files are <span class="font-medium">not</span> actually uploaded. </div>
                </div>
            </vue2-dropzone>
        </div>
        <!-- END: Multiple File Upload -->
    </div>
</template>

<script>
import { UploadCloudIcon } from 'vue-feather-icons';
import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';

export default {
    name: "Uploads",
    props: ['isSticky'],
    components: {vue2Dropzone, UploadCloudIcon},
    data() {
        return {
            dropzoneOptions: {
                url: '/user/uploads',
                thumbnailWidth: 120,
                thumbnailHeight: 170,
                addRemoveLinks: true,
                maxFilesize: 10,
                paramName: 'files',
                acceptedFiles: 'image/png, image/jpg, image/jpeg, image/gif',
                headers: { "My-Awesome-Header": "header value" }
            }
        }
    },
}
</script>

<style scoped>
.lg\:col-span-5 {
    grid-column: span 5 / span 5 !important;
}
.vue-dropzone {
    border: 2px dashed #e5e5e5 !important;
    font-family: Arial,sans-serif !important;
    letter-spacing: .2px !important;
    color: #777 !important;
    transition: .2s linear !important;
    height: 100% !important;
    border-radius: 5px !important;
}
.dropzone-custom-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%;
}
.is_sticky {
    position: sticky;
    top: 0;
    width: 100%;
    height: 85%;
}
</style>
