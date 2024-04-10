<script setup>
import {router, useForm, usePage} from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";


const form = useForm({
    licenseKey: usePage().props.licenseKey ?? '',
});

const verifyLicense = () => {
    form.post(route('install.envato-license'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    })
};
</script>

<template>
        <h2 class="text-2xl font-semibold text-center">Envato License Verification</h2>
        <form @submit.prevent="verifyLicense">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="license_key">License Key</label>
                <input id="license_key" v-model="form.licenseKey" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm"
                       type="text">
            </div>
            <PrimaryButton class="mt-4 w-full"
                    type="submit">
                Verify License
            </PrimaryButton>
        </form>
</template>

<style scoped>

</style>
