<script setup>

import { useForm, usePage} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    envVariables: usePage().props.envVariables ?? '',
});

const submit = () => {
    form.post(route('install.environment-variables.submit'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    })
}

</script>

<template>
        <h2 class="text-3xl font-semibold mb-6">Environment Variables</h2>
        <div class="w-full mb-6">
            <form @submit.prevent="submit">
                <div class="grid grid-cols-1 gap-6">
                    <textarea v-model="form.envVariables" class="mt-1 h-96 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Laravel"/>
                </div>
                <PrimaryButton class="mt-4 w-full">
                    Next Step
                </PrimaryButton>
            </form>
        </div>
</template>

<style scoped>

</style>
