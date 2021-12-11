<template>
    <div class="box mt-5">
        <div class="flex flex-row justify-between px-5 py-4 border-b border-gray-200 sm:flex-row items-center">
            <h2 class="font-medium flex align-center text-base w-full mr-auto">
                <span class="icon-sec"><i class="mr-2 fa-1.5x" :class="addon.icon"></i></span>
                <span class="title-sec">
                    <slot name="title" />
                </span>
            </h2>
            <div class="w-auto sm:w-auto flex items-center sm:mt-0">
                <slot name="enabled" />
            </div>
        </div>
        <div class="px-5 py-2" v-if="isShow">
            <div class="preview">
                <p class="mb-2">{{ addon.short_description }}</p>
                <p class="mb-2"><span class="text-theme-24"><b>Please Note: </b></span> {{ addon.note }}</p>
                <div class="flex flex-col sm:flex-col mt-2 mb-2">
                    <slot name="variants" />
                </div>
                <div class="form-control mt-2">
                    <slot name="instruction"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddonItem",
    props: ["addon", "isOpenVariants"],
    computed: {
        isShow() {
            return this.isOpenVariants.find(v => v === this.addon.title.replace(/\s/g, '_'));
        },
    }
}
</script>

<style scoped>
    .fa-1\.5x {
        font-size: 25px;
    }
</style>
