<template>
    <div class="col-span-12 lg:col-span-3">
        <div class="order-panel active">
            <div class="pos__ticket box p-5">
                <div>
                    <div class="flex flex-col sm:flex-row items-center mb-4 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mb-2 mr-auto">
                            Delivery Time
                        </h2>
                    </div>
                    <div class="delivery-time">
                        <slot name="delivery"></slot>
                    </div>
                </div>
            </div>
            <div class="box p-5 mt-5">
                <slot name="order-details"></slot>
            </div>
            <div class="box p-5 mt-5">
                <div>
                    <div class="flex flex-col sm:flex-row items-center mb-4 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mb-2 mr-auto">
                            Payment Terms
                        </h2>
                    </div>
                    <div class="flex flex-col sm:flex-row mt-2 mb-2">
                        <slot name="pay_terms"></slot>
                    </div>
                </div>
            </div>
            <div class="box p-5 mt-5" v-if="showPaymentMethod">
                <div>
                    <div class="flex flex-col sm:flex-row items-center mb-4 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mb-2 mr-auto">
                            Payment Methods
                        </h2>
                    </div>
                    <slot name="payment_method"></slot>
                </div>
            </div>
            <div class="mt-5">
                <slot name="footer"></slot>
            </div>
        </div>
    </div>
</template>

<script>
import RadioButton from "../Inputs/RadioButton";
export default {
    name: "OrderDeatils",
    props: ['showPaymentMethod'],
    components: {RadioButton}
}
</script>

<style scoped>

</style>
