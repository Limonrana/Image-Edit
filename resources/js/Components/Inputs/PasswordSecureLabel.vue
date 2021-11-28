<template>
<div class="secure-password mb-10">
    <div class="intro-x w-full grid grid-cols-12 gap-4 h-1 mt-3">
        <div class="col-span-3">
            <div class="h-1 rounded" :class="label.uppercase ? 'bg-theme-10' : 'bg-gray-200 dark:bg-dark-2'"></div>
            <div class="text-xs font-thin text-center mt-2">Uppercase</div>
        </div>
        <div class="col-span-3">
            <div class="h-1 rounded" :class="label.number ? 'bg-theme-10' : 'bg-gray-200 dark:bg-dark-2'"></div>
            <div class="text-xs font-thin text-center mt-2">Number</div>
        </div>
        <div class="col-span-3">
            <div class="h-1 rounded" :class="label.specialChar ? 'bg-theme-10' : 'bg-gray-200 dark:bg-dark-2'"></div>
            <div class="text-xs font-thin text-center mt-2">Character</div>
        </div>
        <div class="col-span-3">
            <div class="h-1 rounded" :class="label.maxLength ? 'bg-theme-10' : 'bg-gray-200 dark:bg-dark-2'"></div>
            <div class="text-xs font-thin text-center mt-2">8 Characters</div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "PasswordSecureLabel",
    props: ['label']
}
</script>

<style scoped>

</style>
