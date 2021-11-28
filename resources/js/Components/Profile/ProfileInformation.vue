<template>
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Profile Information
            </h2>
        </div>
        <div class="p-5">
            <form @submit.prevent="submit">
                <div class="flex flex-col-reverse xl:flex-row flex-col">
                    <div class="flex-1 mt-6 xl:mt-0">
                        <div class="col-span-12">
                            <div :class="form.errors.name ? 'has-error mt-3' : 'mt-3'">
                                <custom-label>Display Name</custom-label>
                                <simple-input name="name" type="text" :value="form.name" @handle-input="inputHandler" placeholder="Name" required />
                                <input-error :message="form.errors.name" />
                            </div>
                        </div>
                        <div class="col-span-12">
                            <div :class="form.errors.email ? 'has-error mt-3' : 'mt-3'">
                                <custom-label>Email Address</custom-label>
                                <simple-input name="email" type="email" :value="form.email" @handle-input="inputHandler" placeholder="Email Address" required />
                                <input-error :message="form.errors.email" />
                            </div>
                        </div>
                        <div class="col-span-12">
                            <div :class="form.errors.phone ? 'has-error mt-3' : 'mt-3'">
                                <custom-label>Phone Number</custom-label>
                                <simple-input name="phone" type="text" :value="form.phone" @handle-input="inputHandler" placeholder="Phone Number" required />
                                <input-error :message="form.errors.phone" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-20 mt-5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Save</button>
                    </div>
                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6" v-if="$page.props.jetstream.managesProfilePhotos">
                        <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5">
                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md" :alt="form.name" :src="user.profile_photo_url" v-if="!photoPreview">
                                <img class="rounded-md" :alt="form.name" :src="photoPreview" v-else>
                                <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-24 right-0 top-0 -mr-2 -mt-2" @click="deletePhoto" v-if="user.profile_photo_path">
                                    <x-icon size="1.5x" class="w-4 h-4"></x-icon>
                                </div>
                            </div>
                            <div class="mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="btn btn-primary w-full" @click.prevent="selectNewPhoto">Change Photo</button>
                                <input type="file" name="photo" class="hidden" ref="profile_photo" @change="updatePhotoPreview">
                            </div>
                            <input-error :message="form.errors.photo" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { XIcon } from 'vue-feather-icons';
import CustomLabel from '../Inputs/Label';
import CustomInput from '../Inputs/Input'
import SimpleInput from "../Inputs/SimpleInput";
import InputError from "../Inputs/InputError";

export default {
    name: "ProfileInformation",
    props: ['user'],
    components: {InputError, SimpleInput, CustomLabel, CustomInput, XIcon},
    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                email: this.user ? this.user.email : '',
                name: this.user ? this.user.name : '',
                phone: this.user ? this.user.phone : '',
                photo: null,
            }),
            photoPreview: null,
        }
    },
    mounted() {

    },
    methods: {
        submit() {
            if (this.$refs.profile_photo) {
                this.form.photo = this.$refs.profile_photo.files[0];
            }

            this.form.post(route('user-profile-information.update'), {
                errorBag: 'updateProfileInformation',
                preserveScroll: true,
                onError: () => (this.errors()),
                onSuccess: () => (this.clearPhotoFileInput()),
            });
        },

        selectNewPhoto() {
            this.$refs.profile_photo.click();
        },

        inputHandler(value, name) {
            this.form = {...this.form, [name]: value};
        },

        updatePhotoPreview() {
            const photo = this.$refs.profile_photo.files[0];

            if (! photo) return;

            const reader = new FileReader();

            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(photo);
        },

        deletePhoto() {
            this.$inertia.delete(route('current-user-photo.destroy'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.photoPreview = null;
                    this.clearPhotoFileInput();
                },
            });
        },

        clearPhotoFileInput() {
            if (this.$refs.profile_photo?.value) {
                this.$refs.profile_photo.value = null;
            }
            this.$toast.success("Profile info was updated successfully!");
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
