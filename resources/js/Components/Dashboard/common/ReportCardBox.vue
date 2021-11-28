<template>
    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <slot></slot>
                    <div class="ml-auto">
                        <div class="report-box__indicator tooltip cursor-pointer" :class="isGross ? 'bg-theme-10' : 'bg-theme-24'">
                            {{ grossPercent }}%
                            <chevron-up-icon size="1.5x" class="w-4 h-4 ml-0.5" v-if="isGross"></chevron-up-icon>
                            <chevron-down-icon size="1.5x" class="w-4 h-4 ml-0.5" v-else></chevron-down-icon>
                        </div>
                    </div>
                </div>
                <div class="text-3xl font-medium leading-8 mt-6">$ {{ grossAmount }}</div>
                <div class="text-base text-gray-600 mt-1">{{ title }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import { ChevronDownIcon, ChevronUpIcon } from 'vue-feather-icons';
export default {
    name: "ReportCardBox",
    props: ['title', 'grossAmount', 'grossPercent', 'isGross'],
    components: {ChevronDownIcon, ChevronUpIcon}
}
</script>

<style scoped>

</style>
