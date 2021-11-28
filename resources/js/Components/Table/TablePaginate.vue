<template>
    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
        <ul class="pagination">
            <li>
                <a class="pagination__link" href="">
                    <chevrons-left-icon size="1.5x" class="w-4 h-4"></chevrons-left-icon>
                </a>
            </li>
            <li> <a class="pagination__link pagination__link--active" href="">1</a> </li>
            <li> <a class="pagination__link" href="">2</a> </li>
            <li> <a class="pagination__link" href="">3</a> </li>
            <li>
                <a class="pagination__link" href="">
                    <chevrons-right-icon size="1.5x" class="w-4 h-4"></chevrons-right-icon>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
import { ChevronsLeftIcon, ChevronsRightIcon } from 'vue-feather-icons';
export default {
    name: "TablePaginate",
    components: { ChevronsLeftIcon, ChevronsRightIcon }
}
</script>

<style scoped>
    .pagination__link:hover {
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
    }
    .dark .pagination li .pagination__link.pagination__link--active {
        background-color: #ffffff14 !important;
    }
    .dark .pagination li .pagination__link:hover {
        background-color: #ffffff14 !important;
    }
</style>
