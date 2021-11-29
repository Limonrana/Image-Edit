<template>
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Address Information
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12">
                    <div :class="form.errors.address_line_1 ? 'has-error mt-3' : 'mt-3'">
                        <custom-label>Address Line 1</custom-label>
                        <simple-input name="name" type="text" :value="form.address_line_1" @handle-input="inputHandler" placeholder="Address Line 1" required />
                        <input-error :message="form.errors.address_line_1" />
                    </div>
                </div>
                <div class="col-span-12">
                    <div :class="form.errors.address_line_2 ? 'has-error mt-3' : 'mt-3'">
                        <custom-label>Address Line 2 (Optional)</custom-label>
                        <simple-input name="name" type="text" :value="form.address_line_2" @handle-input="inputHandler" placeholder="Address Line 2 (Optional)" />
                        <input-error :message="form.errors.address_line_2" />
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-6">
                    <div :class="form.errors.company_name ? 'has-error mt-3' : 'mt-3'">
                        <custom-label>Company Name (Optional)</custom-label>
                        <simple-input name="name" type="text" :value="form.company_name" @handle-input="inputHandler" placeholder="Company Name (Optional)" />
                        <input-error :message="form.errors.company_name" />
                    </div>
                    <div class="mt-3">
                        <custom-label>State</custom-label>
                        <custom-select>

                        </custom-select>
                        <select class="form-select">
                            <option>IC</option>
                            <option>FIN</option>
                            <option>Passport</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="update-profile-form-9" class="form-label">ID Number</label>
                        <input id="update-profile-form-9" type="text" class="form-control" placeholder="Input text" value="357821204950001">
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-6">
                    <div class="mt-3 xl:mt-0">
                        <label for="update-profile-form-10" class="form-label">Phone Number</label>
                        <input id="update-profile-form-10" type="text" class="form-control" placeholder="Input text" value="65570828">
                    </div>
                    <div class="mt-3">
                        <label for="update-profile-form-11" class="form-label">Address</label>
                        <input id="update-profile-form-11" type="text" class="form-control" placeholder="Input text" value="10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore">
                    </div>
                    <div class="mt-3">
                        <label for="update-profile-form-12" class="form-label">Bank Name</label>
                        <select id="update-profile-form-12" data-search="true" class="tom-select w-full">
                            <option value="1">SBI - STATE BANK OF INDIA</option>
                            <option value="1">CITI BANK - CITI BANK</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="update-profile-form-13" class="form-label">Bank Account</label>
                        <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" value="DBS Current 011-903573-0">
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button type="button" class="btn btn-primary w-20 mr-auto">Save</button>
                <a href="" class="text-theme-24 flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete Account </a>
            </div>
        </div>
    </div>
</template>

<script>
import CustomLabel from '../Inputs/Label';
import CustomSelect from '../Inputs/Select';
import CustomInput from '../Inputs/Input'
import SimpleInput from "../Inputs/SimpleInput";
import InputError from "../Inputs/InputError";

export default {
    name: "AddressInformation",
    props: ['user'],
    components: {InputError, SimpleInput, CustomLabel, CustomInput, CustomSelect},
}
</script>

<style scoped>

</style>
