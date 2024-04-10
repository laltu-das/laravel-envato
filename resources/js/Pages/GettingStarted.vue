<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>
        <div class="flex flex-col items-center justify-center p-8">
            <h1 class="text-4xl font-bold mb-4">Welcome to {{ $page.props.appName }} Installer</h1>
            <p class="text-lg text-gray-600 mb-6">Your installation journey begins here</p>
            <ApplicationLogo alt="Installation" class="mb-6 h-40"/>
            <Link :href="route('install.server-requirements')"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Get Started
            </Link>
        </div>
</template>

<style scoped>

</style>
