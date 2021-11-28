<template>
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="text" class="search__input form-control dark:bg-dark-1 border-transparent placeholder-theme-8" v-model="search" @input="searchResult" placeholder="Search...">
            <search-icon size="1.5x" class="search__icon dark:text-gray-300"></search-icon>
        </div>
        <a class="notification sm:hidden" href="">
            <search-icon size="1.5x" class="notification__icon dark:text-gray-300"></search-icon>
        </a>
        <div class="search-result" :class="searchResultSection ? 'show' : ''">
            <div class="search-result__content">
                <div class="search-result__content__title">Order</div>
                <div class="mb-5">
                    <search-box-item :href="route('user.orders', { status: 'all' })" title="#ORD-128736" is-type="order">
                        <shopping-cart-icon size="1.5x" class="w-4 h-4"></shopping-cart-icon>
                    </search-box-item>

                    <search-box-item :href="route('user.orders', { status: 'all' })" title="#ORD-128737" is-type="order">
                        <shopping-cart-icon size="1.5x" class="w-4 h-4"></shopping-cart-icon>
                    </search-box-item>

                    <search-box-item :href="route('user.orders', { status: 'all' })" title="#ORD-128738" is-type="order">
                        <shopping-cart-icon size="1.5x" class="w-4 h-4"></shopping-cart-icon>
                    </search-box-item>

                    <search-box-item :href="route('user.orders', { status: 'all' })" title="#ORD-128739" is-type="order">
                        <shopping-cart-icon size="1.5x" class="w-4 h-4"></shopping-cart-icon>
                    </search-box-item>
                </div>
                <div class="search-result__content__title">Transactions</div>
                <div class="mb-5">
                    <search-box-item :href="route('user.invoices')" title="#INV-128736" is-type="invoice">
                        <credit-card-icon size="1.5x" class="w-4 h-4"></credit-card-icon>
                    </search-box-item>

                    <search-box-item :href="route('user.invoices')" title="#INV-128737" is-type="invoice">
                        <credit-card-icon size="1.5x" class="w-4 h-4"></credit-card-icon>
                    </search-box-item>

                    <search-box-item :href="route('user.invoices')" title="#INV-128738" is-type="invoice">
                        <credit-card-icon size="1.5x" class="w-4 h-4"></credit-card-icon>
                    </search-box-item>

                    <search-box-item :href="route('user.invoices')" title="#INV-128739" is-type="invoice">
                        <credit-card-icon size="1.5x" class="w-4 h-4"></credit-card-icon>
                    </search-box-item>
                </div>

                <div class="search-result__content__title">Quotations</div>
                <div>
                    <search-box-item :href="route('user.quotations')" title="#QUOTE-128736" sub-title="Web Development" is-type="quotation">
                        <message-square-icon size="1.5x" class="w-4 h-4"></message-square-icon>
                    </search-box-item>

                    <search-box-item :href="route('user.quotations')" title="#QUOTE-128737" sub-title="Graphic Design" is-type="quotation">
                        <message-square-icon size="1.5x" class="w-4 h-4"></message-square-icon>
                    </search-box-item>

                    <search-box-item :href="route('user.quotations')" title="#QUOTE-128738" sub-title="Digital Marketing" is-type="quotation">
                        <message-square-icon size="1.5x" class="w-4 h-4"></message-square-icon>
                    </search-box-item>

                    <search-box-item :href="route('user.quotations')" title="#QUOTE-128739" sub-title="Web Design" is-type="quotation">
                        <message-square-icon size="1.5x" class="w-4 h-4"></message-square-icon>
                    </search-box-item>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { CreditCardIcon, ShoppingCartIcon, MessageSquareIcon, SearchIcon } from 'vue-feather-icons';
import SearchBoxItem from "./SearchBoxItem";

export default {
    name: "SearchBox",
    components: {SearchBoxItem, CreditCardIcon, ShoppingCartIcon, MessageSquareIcon, SearchIcon},
    data() {
        return {
            searchResultSection: false,
            search: '',
        }
    },
    methods: {
        searchResult() {
            if (this.search.length > 0 && !this.searchResultSection) {
                this.searchResultSection = true;
            }
            if (this.search.length === 0 && this.searchResultSection) {
                this.searchResultSection = false;
            }
        }
    }
}
</script>

<style scoped>

</style>
