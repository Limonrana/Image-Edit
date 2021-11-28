<template>
    <div v-if="hasErrors">
        <div class="alert alert-danger show mb-2 mt-3" role="alert">
            <div class="flex items-center">
                <div class="font-medium text-lg">Whoops! Something went wrong.</div>
                <div class="text-xs bg-white px-1 rounded-md text-gray-800 ml-auto">Error</div>
            </div>
            <div class="mt-3">
                <ul class="mt-3 list-disc list-inside text-sm">
                    <li v-for="(error, key) in errors" :key="key">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-4 h-4 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> {{ error }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    }
</script>
