<template>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <complexity-item icon="flaticon-web-maintenance" unit-price="1.5" :active="true">
            Web Development
        </complexity-item>

        <complexity-item icon="flaticon-web-maintenance" unit-price="1.5" :active="false">
            Web Development
        </complexity-item>

        <complexity-item icon="flaticon-web-maintenance" unit-price="1.5" :active="false">
            Web Development
        </complexity-item>

        <complexity-item icon="flaticon-web-maintenance" unit-price="1.5" :active="false">
            Web Development
        </complexity-item>

        <complexity-item icon="flaticon-web-maintenance" unit-price="1.5" :active="false">
            Web Development
        </complexity-item>

        <complexity-item icon="flaticon-web-maintenance" unit-price="1.5" :active="false">
            Web Development
        </complexity-item>

        <complexity-item icon="flaticon-web-maintenance" unit-price="1.5" :active="false">
            Web Development
        </complexity-item>

        <complexity-item icon="flaticon-web-maintenance" unit-price="1.5" :active="false">
            Web Development
        </complexity-item>

        <complexity-item icon="flaticon-web-maintenance" unit-price="1.5" :active="false">
            Web Development
        </complexity-item>
    </div>
</template>

<script>
import ComplexityItem from "./ComplexityItem";
export default {
    name: "ImageComplexity",
    components: {ComplexityItem}
}
</script>

<style scoped>

</style>
