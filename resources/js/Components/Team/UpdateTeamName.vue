<template>
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Team Name
            </h2>
        </div>
        <div class="p-5">
            <form @submit.prevent="updateTeamName">
                <div class="grid grid-cols-12 gap-x-5">
                    <div class="col-span-12">
                        <div :class="form.errors.name ? 'has-error' : ''">
                            <custom-label>Team Name</custom-label>
                            <simple-input name="name" type="text" :value="form.name" @handle-input="inputHandler" placeholder="Team Name" :disabled="!permissions.canUpdateTeam" />
                            <input-error :message="form.errors.name" />
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-5" v-if="permissions.canUpdateTeam">
                    <button type="submit" class="btn btn-primary w-20 mr-auto" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Update</button>
                </div>
                <div class="mt-5" v-else>
                  <warning-content-alert title="IMPORTANT NOTICE!">
                    OOPS! You can't update the team name, You don't have access for updating the team name.
                  </warning-content-alert>
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
    name: "UpdateTeamName",
    props: ['team', 'permissions'],
    components: {WarningContentAlert, InputError, SimpleInput, CustomLabel},

    data() {
        return {
            form: this.$inertia.form({
                name: this.team.name,
            })
        }
    },

    methods: {
        updateTeamName() {
            this.form.put(route('user.teams.update', this.team), {
                errorBag: 'updateTeamName',
                preserveScroll: true,
                onError: () => (this.errors()),
                onSuccess: () => (this.notification('updated')),
            });
        },

        inputHandler(value, name) {
            this.form = {...this.form, [name]: value};
        },

        notification(text) {
            this.$toast.success(`Team name was ${text} successfully!`);
        },

        errors() {
          this.$toast.error("OOPS! Something went wrong. Please try again!");
        }
    },
}
</script>

<style scoped>

</style>
