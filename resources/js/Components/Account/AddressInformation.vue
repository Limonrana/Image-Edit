<template>
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Address Information
            </h2>
        </div>
        <div class="p-5">
            <form @submit.prevent="submit">
                <div class="grid grid-cols-12 gap-x-5">
                    <div class="col-span-12">
                        <div :class="form.errors.address_line_1 ? 'has-error' : ''">
                            <custom-label>Address Line 1</custom-label>
                            <simple-input name="address_line_1" type="text" :value="form.address_line_1" @handle-input="inputHandler" placeholder="Address Line 1" />
                            <input-error :message="form.errors.address_line_1" />
                        </div>
                    </div>
                    <div class="col-span-12">
                        <div :class="form.errors.address_line_2 ? 'has-error mt-3' : 'mt-3'">
                            <custom-label>Address Line 2 (Optional)</custom-label>
                            <simple-input name="address_line_2" type="text" :value="form.address_line_2" @handle-input="inputHandler" placeholder="Address Line 2 (Optional)" />
                            <input-error :message="form.errors.address_line_2" />
                        </div>
                    </div>
                    <div class="col-span-12">
                        <div :class="form.errors.company_name ? 'has-error mt-3' : 'mt-3'">
                            <custom-label>Company Name (Optional)</custom-label>
                            <simple-input name="company_name" type="text" :value="form.company_name" @handle-input="inputHandler" placeholder="Company Name (Optional)" />
                            <input-error :message="form.errors.company_name" />
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <div :class="form.errors.city ? 'has-error mt-3' : 'mt-3'">
                            <custom-label>City</custom-label>
                            <simple-input name="city" type="text" :value="form.city" @handle-input="inputHandler" placeholder="City" />
                            <input-error :message="form.errors.city" />
                        </div>
                      <div :class="form.errors.country ? 'has-error mt-3' : 'mt-3'">
                        <custom-label>Country</custom-label>
                        <simple-input name="country" type="text" :value="form.country" @handle-input="inputHandler" placeholder="Country" />
                        <input-error :message="form.errors.country" />
                      </div>
                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <div :class="form.errors.zip_code ? 'has-error mt-3' : 'mt-3'">
                            <custom-label>Zip Code</custom-label>
                            <simple-input name="zip_code" type="text" :value="form.zip_code" @handle-input="inputHandler" placeholder="Zip Code" />
                            <input-error :message="form.errors.zip_code" />
                        </div>
                        <div :class="form.errors.state ? 'has-error mt-3' : 'mt-3'">
                            <custom-label>State</custom-label>
                            <simple-input name="state" type="text" :value="form.state" @handle-input="inputHandler" placeholder="State" />
                            <input-error :message="form.errors.state" />
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit" class="btn btn-primary w-20 mr-auto">{{ address ? 'Update' : 'Save' }}</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import CustomLabel from '../Inputs/Label';
import SimpleInput from "../Inputs/SimpleInput";
import InputError from "../Inputs/InputError";

export default {
    name: "AddressInformation",
    props: ['userId', 'address'],
    components: {InputError, SimpleInput, CustomLabel},
    data() {
        return {
            form: this.$inertia.form({
                _method: this.address ? 'PUT' : 'POST',
                id: this.address?.id ? this.address.id : null,
                user_id: this.userId,
                address_line_1: this.address?.address_line_1 ? this.address.address_line_1 : '',
                address_line_2: this.address?.address_line_2 ? this.address.address_line_2 : '',
                company_name: this.address?.company_name ? this.address.company_name : '',
                city: this.address?.city ? this.address.city : '',
                zip_code: this.address?.zip_code ? this.address.zip_code : '',
                state: this.address?.state ? this.address.state : '',
                country: this.address?.country ? this.address.country : '',
            })
        }
    },
    computed: {
       //
    },
    methods: {
        submit() {
            let setRoute = this.address ? route('user.account.address.update') : route('user.account.address.store');
            let setMessage = this.address ? 'updated' : 'created';
            this.form.post(setRoute, {
                preserveScroll: true,
                onError: () => (this.errors()),
                onSuccess: () => (this.notification(setMessage)),
            });
        },

        inputHandler(value, name) {
            this.form = {...this.form, [name]: value};
        },

        notification(text) {
            this.$toast.success(`Address info was ${text} successfully!`);
        },

        errors() {
            if (this.form.hasErrors) {
                this.$toast.error("OOPS! Something went wrong. Please try again!");
            }
        }
    }
}
</script>

<style scoped>

</style>
