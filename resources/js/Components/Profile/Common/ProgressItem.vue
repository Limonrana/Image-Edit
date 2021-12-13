<template>
    <div :class="mt">
        <div class="flex">
            <div class="mr-auto">
                <slot></slot>
            </div>
            <div>{{ total }} / {{ allTotal }}</div>
        </div>
        <div class="progress h-1 mt-2">
            <div class="progress-bar" :class="barTheme" :style="{ width: progress + '%' }"></div>
        </div>
    </div>
</template>

<script>

export default {
    name: "ProgressItem",
    props: ['total', 'allTotal', 'type', 'mt'],
    computed: {
        barTheme() {
            if (this.type === 'pending') return 'bg-theme-23';
            if (this.type === 'completed') return 'bg-theme-10';
            if (this.type === 'cancelled') return 'bg-theme-24';
            if (this.type === 'progress') return 'bg-theme-17';
        },
        progress() {
            return Math.round((this.total / this.allTotal) * 100);
        }
    }
}
</script>

<style scoped>

</style>
