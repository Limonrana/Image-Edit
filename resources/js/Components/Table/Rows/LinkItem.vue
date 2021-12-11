<template>
    <td>
        <inertia-link :href="href" class="font-medium whitespace-nowrap">
            <slot></slot>
        </inertia-link>
    </td>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue";

export default {
    name: "LinkItem",
    props: ["href"],
    components: {InertiaLink}
}
</script>

<style scoped>

</style>
