<template>
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="text" class="search__input form-control dark:bg-dark-1 border-transparent placeholder-theme-8" v-model="form.search" @input="searchResult" placeholder="Search...">
            <search-icon size="1.5x" class="search__icon dark:text-gray-300"></search-icon>
        </div>
        <a class="notification sm:hidden" href="">
            <search-icon size="1.5x" class="notification__icon dark:text-gray-300"></search-icon>
        </a>
        <div class="search-result" :class="searchResultSection ? 'show' : ''">
            <div class="search-result__content">
                <div class="Orders" v-if="orders.length > 0">
                    <div class="search-result__content__title">Orders</div>
                    <div class="mb-5">
                        <template v-for="order in orders">
                            <search-box-item :href="route('user.orders.show', order.order_number)" :title="`#ORD-${order.order_number}`" is-type="order">
                                <shopping-cart-icon size="1.5x" class="w-4 h-4"></shopping-cart-icon>
                            </search-box-item>
                        </template>
                    </div>
                </div>

                <div class="Invoices" v-if="invoices.length > 0">
                    <div class="search-result__content__title">Invoices</div>
                    <div class="mb-5">
                        <template v-for="invoice in invoices">
                            <search-box-item :href="route('user.invoice.show', invoice.invoice_number)" :title="`#INV-${invoice.invoice_number}`" is-type="invoice">
                                <credit-card-icon size="1.5x" class="w-4 h-4"></credit-card-icon>
                            </search-box-item>
                        </template>
                    </div>
                </div>

                <div class="Quotations" v-if="quotations.length > 0">
                    <div class="search-result__content__title">Quotations</div>
                    <div>
                        <search-box-item :href="route('user.quotations')" title="#QUOTE-128736" sub-title="Web Development" is-type="quotation">
                            <message-square-icon size="1.5x" class="w-4 h-4"></message-square-icon>
                        </search-box-item>

                        <template v-for="quotation in quotations">
                            <search-box-item :href="route('user.invoice.show', invoice.invoice_number)" :title="`#QUOTE-${quotation.quotation_number}`" sub-title="Design" is-type="quotation">
                                <message-square-icon size="1.5x" class="w-4 h-4"></message-square-icon>
                            </search-box-item>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { CreditCardIcon, ShoppingCartIcon, MessageSquareIcon, SearchIcon } from 'vue-feather-icons';
import SearchBoxItem from "./SearchBoxItem";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";

export default {
    name: "SearchBox",
    components: {SearchBoxItem, CreditCardIcon, ShoppingCartIcon, MessageSquareIcon, SearchIcon},
    data() {
        return {
            searchResultSection: false,
            orders: [],
            invoices: [],
            quotations: [],
            form: {
                search: '',
            },
        }
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function() {
                axios.get(route('user.search', { search: this.form.search }))
                    .then(res => {
                        this.orders = res.data.orders;
                        this.invoices = res.data.invoices;
                        this.quotations = res.data.quotations;
                    })
                    .catch(err => console.log(err.message));
            }, 1000),
        },
    },
    methods: {
        searchResult() {
            if (this.form.search.length > 0 && !this.searchResultSection) {
                this.searchResultSection = true;
            }
            if (this.form.search.length === 0 && this.searchResultSection) {
                this.searchResultSection = false;
            }
        }
    }
}
</script>

<style scoped>

</style>
