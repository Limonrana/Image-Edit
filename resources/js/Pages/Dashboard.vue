<template>
    <app-layout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Home />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '../Layouts/AppLayout.vue'
    import Home from './Home.vue'

    export default {
        components: {
            AppLayout,
            Home,
        },
    }
</script>
