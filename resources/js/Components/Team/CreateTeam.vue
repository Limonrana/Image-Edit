<template>
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Create New Team
            </h2>
        </div>
        <div class="p-5">
            <p class="text-xs font-light text-gray-400 mb-3">Team Owner</p>
            <div class="relative flex items-center">
                <div class="w-12 h-12 image-fit">
                    <img :alt="$page.props.user.name" class="rounded-full" :src="$page.props.user.profile_photo_url">
                </div>
                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">{{ $page.props.user.name }}</div>
                    <div class="text-gray-600">{{ $page.props.user.email }}</div>
                </div>
            </div>
        </div>
        <div class="p-5">
            <!-- From Start -->
            <form @submit.prevent="createTeam">
                <div class="grid grid-cols-12 gap-x-5">
                    <div class="col-span-12">
                        <div :class="form.errors.name ? 'has-error' : ''">
                            <custom-label>Team Name</custom-label>
                            <simple-input name="name" type="text" :value="form.name" @handle-input="inputHandler" placeholder="Team Name" autofocus />
                            <input-error :message="form.errors.name" />
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit" class="btn btn-primary w-20 mr-auto" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Create</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import CustomLabel from '../Inputs/Label';
import SimpleInput from "../Inputs/SimpleInput";
import InputError from "../Inputs/InputError";
import WarningContentAlert from "../Alerts/WarningContentAlert";

export default {
    name: "CreateTeam",
    props: ['team', 'permissions'],
    components: {WarningContentAlert, InputError, SimpleInput, CustomLabel},

    data() {
        return {
            form: this.$inertia.form({
                name: '',
            })
        }
    },

    methods: {
        createTeam() {
            this.form.post(route('user.teams.store'), {
                errorBag: 'createTeam',
                preserveScroll: true,
                onError: () => (this.errors()),
                onSuccess: () => (this.notification('created')),
            });
        },

        inputHandler(value, name) {
            this.form = {...this.form, [name]: value};
        },

        notification(text) {
            this.$toast.success(`Team was ${text} successfully!`);
        },

        errors() {
            if (this.form.hasErrors) {
                this.$toast.error("OOPS! Something went wrong. Please try again!");
            }
        }
    },
}
</script>

<style scoped>

</style>
