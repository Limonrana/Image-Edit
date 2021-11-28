<template>
    <div v-show="message">
        <div class="pristine-error text-theme-24 mt-2">{{ message }}</div>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>

<style scoped>

</style>
