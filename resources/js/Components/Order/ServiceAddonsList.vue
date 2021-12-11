<template>
    <div class="addons-section">
        <div class="w-full flex justify-center border-t border-theme-10 mt-10 dark:border-dark-5 mt-2">
            <div class="font-medium text-base bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600">ADD-ONS</div>
        </div>
        <div class="addons-list">
            <addon-item :is-show="false">
                <BoxIcon class="mr-2" size="2x" /> Shadow Adding
            </addon-item>

            <addon-item :is-show="false">
                <CropIcon class="mr-2" size="2x" /> Cropping & Resizing
            </addon-item>

            <addon-item :is-show="false">
                <PenToolIcon class="mr-2" size="2x" /> 3D / Mannequine Remove
            </addon-item>

            <addon-item :is-show="false">
                <EyeIcon class="mr-2" size="2x" /> Photo Retouching
            </addon-item>

            <addon-item :is-show="false">
                <CrosshairIcon class="mr-2" size="2x" /> Color Corrections
            </addon-item>
        </div>
    </div>
</template>

<script>
import AddonItem from "./AddonItem";
export default {
    name: "ServiceAddonsList",
    components: {AddonItem}
}
</script>

<style scoped>

</style>
