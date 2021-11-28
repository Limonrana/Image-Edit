<template>
    <div class="col-span-12 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto mt-3">
        <div class="intro-x flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-auto">
                Important Notes
            </h2>
        </div>
        <div class="mt-5 intro-x">
            <div class="box zoom-in">
                <div class="tiny-slider" id="important-notes">
                    <note-slider-item title="Lorem Ipsum is simply dummy text" time="20 Hours ago">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </note-slider-item>
                </div>
            </div>
        </div>
        <div class="mt-5 intro-x">
            <div class="box zoom-in">
                <div class="tiny-slider">
                    <note-slider-item title="Lorem Ipsum is simply dummy text" time="22 Hours ago">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </note-slider-item>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NoteSliderItem from "./common/NoteSliderItem";
import { ChevronLeftIcon, ChevronRightIcon } from 'vue-feather-icons';
export default {
    name: "ImportantNoteSlider",
    components: {NoteSliderItem, ChevronLeftIcon, ChevronRightIcon}
}
</script>

<style scoped>

</style>
