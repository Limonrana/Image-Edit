<template>
    <button type="button" class="btn btn-primary" @click="click">
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: "PrimaryClickButton",
    props: {
        click: {
            type: Function,
        },
    }
}
</script>

<style scoped>

</style>
