<template>
    <td class="table-report__action w-56">
        <div class="flex justify-center items-center">
            <inertia-link class="flex items-center mr-3" :href="href1">
                <slot name="btn-1" />
            </inertia-link>
            <inertia-link class="flex items-center text-theme-24" :href="href2">
                <slot name="btn-2" />
            </inertia-link>
        </div>
    </td>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue";

export default {
    name: "ActionsItem",
    props: ["href1", "href2"],
    components: {InertiaLink},
}
</script>

<style scoped>

</style>
