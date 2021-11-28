<template>
    <div class="custom-table">
        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
            <table class="table table-report">
                <slot name="thead"></slot>
                <tbody>
                    <slot name="tbody"></slot>
                </tbody>
            </table>
        </div>
        <slot name="paginate"></slot>
    </div>
</template>

<script>
export default {
    name: "CustomTable"
}
</script>

<style scoped>

</style>
