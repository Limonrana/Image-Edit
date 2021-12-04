<template>
    <div class="alert alert-warning show mb-2" role="alert">
        <div class="flex items-center">
            <div class="font-medium text-lg">{{ title }}</div>
            <div class="text-xs bg-white px-1 rounded-md text-gray-800 ml-auto">Warning</div>
        </div>
        <div class="mt-3">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "WarningContentAlert",
    props: ['title'],
}
</script>

<style scoped>

</style>
