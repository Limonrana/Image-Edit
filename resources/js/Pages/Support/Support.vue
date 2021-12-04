<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="Support">
            <div class="flex grid-cols-12 gap-6 justify-center items-center mt-5">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <!-- BEGIN: Form Layout -->
                    <div class="intro-y box p-5">
                        <div class="intro-y mt-3 mb-3 text-center">
                            <h2 class="text-2xl font-medium mr-auto">
                                OUR SUPPORT
                            </h2>
                        </div>
                        <form action="">
                            <div :class="form.errors.name ? 'has-error' : ''">
                                <custom-label>Name</custom-label>
                                <simple-input class="form-control w-full" name="name" type="text" :value="form.name" @handle-input="inputHandler" placeholder="Name" />
                                <input-error :message="form.errors.name" />
                            </div>

                            <div :class="form.errors.email ? 'has-error mt-3' : 'mt-3'">
                                <custom-label>Email</custom-label>
                                <simple-input class="form-control w-full" name="email" type="email" :value="form.email" @handle-input="inputHandler" placeholder="Email" />
                                <input-error :message="form.errors.email" />
                            </div>
                            <div :class="form.errors.subject ? 'has-error mt-3' : 'mt-3'">
                                <custom-label>Subject</custom-label>
                                <simple-input class="form-control w-full" name="subject" type="text" :value="form.subject" @handle-input="inputHandler" placeholder="Subject" />
                                <input-error :message="form.errors.subject" />
                            </div>
                            <div class="mt-3">
                                <div class="sm:grid grid-cols-2 gap-2">
                                    <div class="input-group">
                                        <div :class="form.errors.order ? 'has-error mt-3' : 'mt-3'">
                                            <custom-label>Related Order</custom-label>
                                            <select class="form-control w-full" v-model="form.order">
                                                <option value="choose" selected>Choose Related Order</option>
                                                <option value="200101">#ORDER-200101</option>
                                                <option value="200102">#ORDER-200102</option>
                                                <option value="200103">#ORDER-200103</option>
                                                <option value="200104">#ORDER-200104</option>
                                                <option value="200105">#ORDER-200105</option>
                                            </select>
                                            <input-error :message="form.errors.order" />
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div :class="form.errors.priority ? 'has-error mt-3' : 'mt-3'">
                                            <custom-label>Priority</custom-label>
                                            <select class="form-control w-full" v-model="form.priority">
                                                <option value="choose">Choose Your Priority</option>
                                                <option value="200101">High</option>
                                                <option value="200102">Medium</option>
                                                <option value="200103">Low</option>
                                            </select>
                                            <input-error :message="form.errors.priority" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div :class="form.errors.message ? 'has-error mt-3' : 'mt-3'">
                                <custom-label>Message</custom-label>
                                <textarea class="form-control w-full" name="message" placeholder="Message" row="4"></textarea>
                                <input-error :message="form.errors.message" />
                            </div>
                        </form>
                        <div class="text-right mt-5">
                            <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-primary w-24 mr-auto" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Create</button>
                        </div>
                    </div>
                    <!-- END: Form Layout -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import SimpleInput from "@/Components/Inputs/SimpleInput";
import InputError from "@/Components/Inputs/InputError";
import CustomLabel from "@/Components/Inputs/Label";

export default {
    name: "Support",
    components: {InputError, SimpleInput, CustomLabel, AppLayout},
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                subject: '',
                order: 'choose',
                priority: 'choose',
                message: '',
            })
        }
    },
}
</script>

<style scoped>
    .Support {
        margin-top: 7% !important;
    }
</style>
