<template>
    <td class="w-40">
        <div class="flex items-center justify-center" :class="statusClasses">
            <check-square-icon size="1.5x" class="w-4 h-4 mr-2"></check-square-icon> <slot />
        </div>
    </td>
</template>

<script>
import { CheckSquareIcon } from 'vue-feather-icons';

export default {
    name: "StatusIconItem",
    props: ["statusClasses"],
    components: {CheckSquareIcon}
}
</script>

<style scoped>

</style>
