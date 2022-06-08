<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="CreateOrder mb-10">
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Create New Order
                </h2>
            </div>
            <div class="pos intro-y grid grid-cols-12 gap-5 mt-2">
                <!-- BEGIN: Upload Item -->
                <div class="intro-y col-span-12 lg:col-span-4 -mt-4">
                    <!-- BEGIN: Multiple File Upload -->
                    <div class="intro-y min-h-100 max-h-full box mt-5 overflow-y sm:h-96" :class="isSticky ? 'is_sticky' : ''">
                        <vue2-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" :duplicateCheck="true" :useCustomSlot="true" @vdropzone-success="uploadSuccess" @vdropzone-removed-file="removeSingleUpload">
                            <div class="dropzone-custom-content">
                                <upload-cloud-icon class="" size="4x" />
                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                <div class="text-gray-600">Only JPG, JPEG, PNG allowed for upload file or image</div>
                                <div class="text-gray-600">Per image Max file size would be 10MB</div>
                            </div>
                        </vue2-dropzone>
                    </div>
                    <!-- END: Multiple File Upload -->
                </div>
                <!-- END: Upload Item -->

                <!-- BEGIN: Item List -->
                <div class="intro-y col-span-12 lg:col-span-5 -mt-4 sm:col-span-12">
                    <!-- BEGIN: Complexity List -->
                    <div class="grid grid-cols-12 gap-5 mt-5">
                        <template v-for="complexity in complexities">
                            <complexity-item :complexity="complexity" :count="complexities.length" :active="complexity.id === form.complexityItem.id" @handle-complexity="handleComplexity(complexity)">
                                {{ complexity.name }}
                            </complexity-item>
                        </template>
                    </div>
                    <!-- END: Complexity List -->

                    <!-- BEGIN: Returned File Type -->
                    <div class="box p-5 mt-5">
                        <div>
                            <div class="flex flex-col sm:flex-row items-center mb-4 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mb-2 mr-auto">
                                    Returned File Type
                                </h2>
                            </div>
                            <div class="flex flex-row sm:flex-row mt-2 mb-2">
                                <radio-button name="file_type" input-value="jpg" :is-checked="form.fileType === 'jpg'" classes="mr-3" @handle-input="fileTypeHandler">
                                    JPG
                                </radio-button>
                                <radio-button name="file_type" input-value="png" :is-checked="form.fileType === 'png'" classes="mr-3" @handle-input="fileTypeHandler">
                                    PNG
                                </radio-button>
                                <radio-button name="file_type" input-value="psd" :is-checked="form.fileType === 'psd'" classes="mr-3" @handle-input="fileTypeHandler">
                                    PSD
                                </radio-button>
                                <radio-button name="file_type" input-value="tiff" :is-checked="form.fileType === 'tiff'" classes="mr-3" @handle-input="fileTypeHandler">
                                    TIFF
                                </radio-button>
                            </div>
                        </div>
                    </div>
                    <!-- END: Returned File Type -->

                    <!-- BEGIN: Background type -->
                    <div class="box p-5 mt-5">
                        <div>
                            <div class="flex flex-col sm:flex-row items-center mb-4 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mb-2 mr-auto">
                                    Background Options
                                </h2>
                            </div>
                            <div class="flex flex-row sm:flex-row mt-2 mb-2">
                                <radio-button name="bg_option" input-value="white" :is-checked="form.background === 'white'" classes="mr-3" @handle-input="bgHandler">
                                    White
                                </radio-button>
                                <radio-button name="bg_option" input-value="original" :is-checked="form.background === 'original'" classes="mr-3" @handle-input="bgHandler">
                                    Keep Original
                                </radio-button>
                                <radio-button name="bg_option" input-value="transparent" :is-checked="form.background === 'transparent'" classes="mr-3" @handle-input="bgHandler">
                                    Transparent
                                </radio-button>
                            </div>
                        </div>
                    </div>
                    <!-- END: Background type -->

                    <!-- BEGIN: Order note -->
                    <div class="box p-5 mt-5">
                        <div>
                            <div class="flex flex-col sm:flex-col items-center mb-4 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mb-2 mr-auto">
                                    Order Instruction
                                </h2>
                            </div>
                            <div class="mt-2 mb-2">
                                <textarea class="form-control" placeholder="Write your order instruction..." rows="3" v-model="form.instruction"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- END: Order note -->

                    <!-- BEGIN: Addons List -->
                    <div class="addons-section">
                        <div class="w-full flex justify-center border-t border-theme-10 mt-10 dark:border-dark-5 mt-2">
                            <div class="font-medium text-base bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600">SERVICE ADD-ONS</div>
                        </div>
                        <div class="addons-list">
                            <template v-for="addon in service_addons">
                                <addon-item :addon="addon" :is-open-variants="isOpenVariants">
                                    <template #title>
                                        {{ addon.title }}
                                    </template>
                                    <template #enabled>
                                        <swatch-input :input-value="addon.title.replace(/\s/g, '_')" v-model="isOpenVariants" />
                                    </template>
                                    <template #variants>
                                        <div class="variants" v-for="(variant, index) in JSON.parse(addon.variants)" :key="index">
                                            <radio-input :name="variant.option" :variant-id="addon.id" :variant-name="addon.title"
                                                         :variant-price="variant.price" @handle-input="handleVariant">
                                                {{ variant.option }} - ${{ variant.price }}
                                            </radio-input>
                                        </div>
                                    </template>
                                    <template #instruction>
                                        <textarea class="form-control" placeholder="Write your service addon related instruction..." rows="2" @input="handleServiceAddonDes($event, addon.id)" :disabled="isEnabledInstruction(addon.id)"></textarea>
                                        <div class="text-right mt-3">
                                            <button type="button" class="btn w-auto border-gray-400 dark:border-dark-5 text-gray-600" @click="clearSingleItem(addon)">Remove</button>
                                        </div>
                                    </template>
                                </addon-item>
                            </template>
                        </div>
                    </div>
                    <!-- END: Addons List -->
                </div>
                <!-- END: Item List -->
                <!-- BEGIN: Order Details -->
                <order-deatils :show-payment-method="form.isPayTerms === '1'">
                    <!-- Start: Delivery Time Set Items -->
                    <template #delivery>
                        <div class="flex flex-col sm:flex-row mt-2 mb-2">
                            <radio-button name="delivery" input-value="24" :is-checked="form.deadline === '24'" classes="w-1/2" @handle-input="deliveryHandler">
                                24 Hours <span class="text-theme-10">(+15%)</span>
                            </radio-button>

                            <radio-button name="delivery" input-value="48" :is-checked="form.deadline === '48'" classes="w-1/2" @handle-input="deliveryHandler">
                                48 Hours
                            </radio-button>
                        </div>
                        <div class="flex flex-col sm:flex-row mt-2 mb-2">
                            <radio-button name="delivery" input-value="72" :is-checked="form.deadline === '72'" classes="w-1/2" @handle-input="deliveryHandler">
                                72 Hours
                            </radio-button>

                            <radio-button name="delivery" input-value="120" :is-checked="form.deadline === '120'" classes="w-1/2" @handle-input="deliveryHandler">
                                Flexible
                            </radio-button>
                        </div>
                    </template>

                    <!-- Start: Order Details Items -->
                    <template #order-details>
                        <order-price-item title="Quantity" :total="form.quantity" />
                        <order-price-item :title="`CP Price: ($${form.complexityItem.price})`"
                                          :total="`$${cpTotal.toFixed(2)}`" classes="mt-4" />
                        <template v-for="variant in variantsList">
                            <order-price-item :title="`${variantName(variant.name)}: ($${variant.price})`"
                                              :total="`$${(parseFloat(variant.price) * form.quantity).toFixed(2)}`" classes="mt-4" />
                        </template>
                        <div class="flex mt-4 pt-4 border-t border-gray-200 dark:border-dark-5">
                            <div class="mr-auto font-medium text-base">Total Charge</div>
                            <div class="font-medium text-base">${{ totalCharge }}</div>
                        </div>
                    </template>

                    <!-- Start: Set Payment Terms -->
                    <template #pay_terms>
                        <radio-button name="pay_terms" input-value="1" :is-checked="form.isPayTerms === '1'" classes="w-1/2" @handle-input="paymentHandler">
                            Pay Now
                        </radio-button>
                        <radio-button name="pay_terms" input-value="0" :is-checked="form.isPayTerms === '0'" classes="w-1/2" @handle-input="paymentHandler">
                            Pay Later
                        </radio-button>
                    </template>

                    <!-- Start: Set Payment Method -->
                    <template #payment_method>
                        <div class="flex flex-col sm:flex-col mt-2 mb-2">
                            <radio-button name="payment_method" input-value="Paypal" :is-checked="form.paymentMethod === 'Paypal'" classes="w-full" @handle-input="methodSetHandler">
                                <img class="payment_paypal" :src="'../../../images/paypal-icon.png'" alt="paypal-icon">
                            </radio-button>
                            <radio-button name="payment_method" input-value="Card" :is-checked="form.paymentMethod === 'Card'" classes="w-full" @handle-input="methodSetHandler">
                                <img class="payment_card" :src="'../../../images/card-icons.png'" alt="card-icons">
                            </radio-button>
                        </div>
                    </template>

                    <!-- Start: Order Now Button -->
                    <template #footer>
                        <div class="full-sec" v-show="form.isPayTerms === '1'">
                            <div class="box p-5 mt-5" v-show="form.paymentMethod === 'Card'">
                                <div class="card-title">
                                    <h2 class="font-medium text-base mb-2 mr-auto">
                                        Credit/Debit Card
                                    </h2>
                                </div>
                                <div class="card-section mb-5">
                                    <stripe-element-card ref="stripeRef" :pk="stripe_pk" :hide-postal-code="true" @token="tokenCreatedStripe" />
                                </div>
                                <div class="flex">
                                    <button class="btn w-32 border-gray-400 dark:border-dark-5 text-gray-600 dark:text-gray-300" @click="clearItem">Clear Items</button>
                                    <button class="btn btn-primary w-32 shadow-md ml-auto" @click="submitStripe">Order Now</button>
                                </div>
                            </div>
                            <div class="box p-5 mt-5" v-show="form.paymentMethod === 'Paypal'">
                                <div class="w-full" ref="paypal"></div>
                                <button class="btn w-full border-gray-400 mt-1 dark:border-dark-5 text-gray-600 dark:text-gray-300" @click="clearItem">Clear Items</button>
                            </div>
                        </div>
                        <div class="flex" v-if="form.isPayTerms === '0'">
                            <button class="btn w-32 border-gray-400 dark:border-dark-5 text-gray-600 dark:text-gray-300" @click="clearItem">Clear Items</button>
                            <button class="btn btn-primary w-32 shadow-md ml-auto" @click="createOrder">Order Now</button>
                        </div>
                    </template>
                </order-deatils>
                <!-- END: Order Detaills -->
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import { StripeElementCard } from '@vue-stripe/vue-stripe';
import {BoxIcon, CropIcon, CrosshairIcon, EyeIcon, PenToolIcon, UploadCloudIcon} from 'vue-feather-icons';
import ComplexityItem from "../../Components/Order/ComplexityItem";
import AddonItem from "../../Components/Order/AddonItem";
import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import RadioInput from "../../Components/Order/RadioInput";
import SwatchInput from "../../Components/Inputs/SwatchInput";
import OrderDeatils from "../../Components/Order/OrderDeatils";
import RadioButton from "../../Components/Inputs/RadioButton";
import OrderPriceItem from "../../Components/Order/OrderPriceItem";
import ConfirmationModal from "../../Components/Modals/ConfirmationModal";

export default {
    name: "CreateOrder",
    props:  ['complexities', 'service_addons', 'app_url', 'csrf', 'stripe_pk', 'paypal_client_id', 'user'],
    components: {
        StripeElementCard,
        ConfirmationModal,
        OrderPriceItem,
        RadioButton,
        OrderDeatils,
        SwatchInput,
        RadioInput,
        AddonItem,
        ComplexityItem,
        AppLayout,
        BoxIcon,
        CropIcon,
        PenToolIcon,
        EyeIcon,
        CrosshairIcon,
        vue2Dropzone,
        UploadCloudIcon
    },
    data() {
        return {
            serviceId: null,
            isLoading: false,
            isEditing: false,
            isSubmit: false,
            isOpenVariants: [],
            form: this.$inertia.form({
                token: null,
                addons: [],
                uploads: [],
                user_id: this.user.id,
                quantity: 0,
                deadline: '24',
                isPayTerms: '1',
                fileType: 'jpg',
                background: 'white',
                instruction: '',
                paymentMethod: 'Paypal',
                transactionId: null,
                complexityItem: {
                    id: this.complexities[0].id,
                    price: this.complexities[0].price,
                }
            }),
            dropzoneOptions: {
                url: '/user/orders/uploads',
                thumbnailWidth: 120,
                thumbnailHeight: 170,
                addRemoveLinks: true,
                maxFilesize: 10,
                paramName: 'files',
                acceptedFiles: 'image/png, image/jpg, image/jpeg, image/gif',
                headers: { "X-CSRF-Token": this.csrf }
            },
            isSticky: false,
            paypalScript: null,
        }
    },
    computed: {
        cpTotal() {
            return parseFloat(this.form.complexityItem.price) * this.form.quantity;
        },
        variantsList() {
            return this.form.addons;
        },
        totalCharge() {
            let addonsPrice = this.form.addons.reduce((sum, addon) => (parseFloat(addon.price) * this.form.quantity) + sum, 0);
            return (addonsPrice + this.cpTotal).toFixed(2);
        }
    },
    mounted() {
        // this.paypalScriptSetup();
        window.addEventListener('scroll', this.handleScroll);
    },
    beforeDestroy() {
        // this.$refs.paypal.remove();
        // document.head.removeChild(this.paypalScript);
    },
    methods: {
        uploadSuccess(file, response) {
            this.form.uploads = [...this.form.uploads, response];
            this.form.quantity = this.form.uploads.length ? this.form.uploads.length : 0;
            this.isEditing = true;
        },

        removeSingleUpload(file, error, xhr) {
            if (!error && !this.isSubmit) {
                let findId = this.form.uploads.find(x => x.name === file.name);
                this.$inertia.delete(route('user.orders.uploads.destroy', findId.id), {
                    preserveScroll: true,
                    onError: () => this.errors(),
                    onSuccess: () => {
                        this.form.uploads = this.form.uploads.filter(x => x.name !== file.name);
                        if (this.form.uploads.length === 0) {
                            this.isEditing = false;
                        }
                    },
                })
            } else {
                console.log(error);
            }
        },

        submitStripe() {
            if (this.form.isPayTerms === '1') {
                this.isLoading = true;
                this.$refs.stripeRef.submit();
            } else {
                this.createOrder();
            }
        },

        tokenCreatedStripe (token) {
            this.form.token = token.id;
            // send it to your server
            this.createOrder();
            this.isLoading = false;
        },

        createOrder() {
            this.isSubmit = true;
            this.$inertia.post(route('user.orders.store'), {...this.form, totalCost: parseFloat(this.totalCharge)}, {
                preserveScroll: true,
                onError: () => this.errors(),
                onSuccess: () => {
                    this.notification('Order was created successfully!');
                    this.form.reset();
                    this.$refs.myVueDropzone.removeAllFiles();
                    this.isOpenVariants = [];
                },
            });
        },

        handleComplexity(complexity) {
            this.form.complexityItem = {...this.form.complexityItem, id: complexity.id, price: complexity.price};
        },

        handleVariant(value, addonId, variantPrice) {
            this.form.addons = [...this.form.addons, { id: addonId, name: value.replace(/_/g, ' '), price: variantPrice }];
        },

        handleServiceAddonDes(e, id) {
            let newAddons = [];
            let oldAddons = [...this.form.addons];
            for (let i = 0; i < oldAddons.length; i += 1) {
                const element = oldAddons[i];
                if (element.id === id) {
                    newAddons.push({ ...element, instruction: e.target.value });
                } else {
                    newAddons.push(element);
                }
            }
            this.form.addons = newAddons;
        },

        deliveryHandler(value) {
            this.form.deadline = value;
        },

        paymentHandler(value) {
            this.form.isPayTerms = value;
        },

        methodSetHandler(value) {
            this.form.paymentMethod = value;
        },

        fileTypeHandler(value) {
            this.form.fileType = value;
        },

        bgHandler(value) {
            this.form.background = value;
        },

        variantName(string) {
            let newString = string.replace(/_/g, ' ');
            return newString.charAt(0).toUpperCase() + newString.slice(1);
        },

        isEnabledInstruction(id) {
            let find = this.variantsList.find(x => x.id === id);
            return !find;
        },

        notification(message) {
            this.$toast.success(message);
        },

        errors() {
            this.$toast.error("OOPS! Something went wrong. Please try again!");
        },

        clearSingleItem(addon) {
            let newAddons = [...this.form.addons];
            this.form.addons = newAddons.filter(x => x.id !== addon.id);
            this.isOpenVariants = this.isOpenVariants.filter(x => x !== addon.title.replace(/\s/g, '_'));
        },

        clearItem() {
            this.form.reset();
            this.isOpenVariants = [];
        },

        pageLeave() {
            this.$once(
                'hook:destroyed',
                this.$inertia.on('before', (event) => {
                    if (this.isEditing) {
                        alert('You have uploaded image, please remove all images!')
                        event.preventDefault();
                    }
                })
            );
        },

        paypalScriptSetup() {
            const newScript = document.createElement('script');
            newScript.onerror = (err => console.error('An error occured while loading the PayPal JS SDK', err));
            newScript.onload = this.setLoaded;
            document.head.appendChild(newScript);
            newScript.src = `https://www.paypal.com/sdk/js?client-id=${this.paypal_client_id}`;
            this.paypalScript = newScript;

            // // Prevent loading the script more than once
            // const script = document.createElement("script");
            // script.src =
            //     `https://www.paypal.com/sdk/js?client-id=${this.paypal_client_id}`;
            // this.paypalScript = document.body.appendChild(script);
            // script.addEventListener("load", this.setLoaded);
        },

        setLoaded(resp) {
            if (window.paypal) {
                window.paypal
                    .Buttons({
                        createOrder: (data, actions) => {
                            return actions.order.create({
                                purchase_units: [
                                    {
                                        description: "Purchase service from Omega Studio",
                                        amount: {
                                            currency_code: "USD",
                                            value: this.totalCharge,
                                        }
                                    }
                                ]
                            });
                        },
                        onApprove: async (data, actions, resp) => {
                            const order = await actions.order.capture();
                            this.form.transactionId = data.orderID;
                            this.createOrder();
                        },
                        onError: err => {
                            console.log(err);
                        }
                    })
                    .render(this.$refs.paypal);
            }
        },

        handleScroll() {
            if (window.pageYOffset > 200) {
                this.isSticky = true;
            } else {
                this.isSticky = false;
            }
        },
    }
}
</script>

<style scoped>
    .lg\:col-span-5 {
        grid-column: span 5 / span 5 !important;
    }

    .overflow-y {
        overflow-y: overlay;
    }

    .vue-dropzone {
        border: 2px dashed #e5e5e5 !important;
        font-family: Arial,sans-serif !important;
        letter-spacing: .2px !important;
        color: #777 !important;
        transition: .2s linear !important;
        height: 100% !important;
        border-radius: 5px !important;
    }

    .dropzone-custom-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
    }

    .payment_paypal {
        width: 100px;
    }

    .payment_card {
        height: 45px;
    }

    .is_sticky {
        position: sticky;
        top: 0;
        width: 100%;
        height: 85%;
    }

    @media screen and (min-device-width: 200px) and (max-device-width: 1023px) {
        .sm\:col-span-12 {
            grid-column: span 12 / span 12 !important;
        }
        .sm\:h-96 {
            height: 30rem;
        }
    }
</style>
