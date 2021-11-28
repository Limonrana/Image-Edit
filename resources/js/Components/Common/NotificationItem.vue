<template>
    <div class="cursor-pointer relative flex items-center mb-4">
        <div class="w-12 h-12 flex-none image-fit mr-1">
            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" :src="image">
            <div class="w-3 h-3 bg-theme-10 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
        </div>
        <div class="ml-2 overflow-hidden">
            <div class="flex items-center">
                <a href="javascript:;" class="font-medium truncate mr-5">{{ name }}</a>
                <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">{{ time }}</div>
            </div>
            <div class="w-full truncate text-gray-600 mt-0.5">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NotificationItem",
    props: ['name', 'time', 'image'],
}
</script>

<style scoped>

</style>
