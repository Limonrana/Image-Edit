<template>
    <th class="whitespace-nowrap" :style="styles">
        <slot></slot>
    </th>
</template>

<script>
export default {
    name: "TableHeadItem",
    props: ['styles']
}
</script>

<style scoped>

</style>
