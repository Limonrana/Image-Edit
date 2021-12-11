<template>
    <div class="flex" :class="classes ? classes : ''">
        <div class="mr-auto">{{ title }}</div>
        <div class="font-medium">{{ total }}</div>
    </div>
</template>

<script>
export default {
    name: "OrderPriceItem",
    props: ['title', 'total', 'classes'],
}
</script>

<style scoped>

</style>
