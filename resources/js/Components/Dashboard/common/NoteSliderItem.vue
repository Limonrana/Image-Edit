<template>
    <div class="p-5">
        <div class="text-base font-medium truncate">{{ title }}</div>
        <div class="text-gray-500 mt-1">{{ time }}</div>
        <div class="text-gray-600 text-justify mt-1">
            <slot></slot>
        </div>
        <div class="font-medium flex mt-5">
            <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
            <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "NoteSliderItem",
    props: ['title', 'time'],
}
</script>

<style scoped>

</style>
