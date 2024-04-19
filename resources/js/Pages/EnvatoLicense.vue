<script setup>
import { ref } from 'vue';
import axios from 'axios';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const envatoItemId = ref('');
const licenseKey = ref('');
const errors = ref({});
const processing = ref(false);

const verifyLicense = async () => {
  processing.value = true;
  errors.value = {};  // Clear previous errors before new submission

  try {
    const response = await axios.post('/api/envato-license', {
      envatoItemId: envatoItemId.value,
      licenseKey: licenseKey.value,
    });
    // Handle the response if there's any specific action needed on success
    envatoItemId.value = '';
    licenseKey.value = '';
    // Optionally, redirect or perform other actions on success
  } catch (error) {
    if (error.response && error.response.data && error.response.status === 422) {
      errors.value = error.response.data.errors;  // Capturing Laravel validation errors
    } else {
      // General error handling
      console.error('Unexpected error:', error);
      errors.value = { general: ['An unexpected error occurred.'] };
    }
  } finally {
    processing.value = false;
  }
}
</script>

<template>
  <h2 class="text-2xl font-semibold text-center">Envato License Verification</h2>
  <form @submit.prevent="verifyLicense">
    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="envatoItemId">Envato Item ID</label>
      <input id="envatoItemId" v-model="envatoItemId"
             class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm" type="text">
      <div v-if="errors.envatoItemId">{{ errors.envatoItemId }}</div>
    </div>
    <div class="">
      <label class="block text-sm font-medium text-gray-700" for="licenseKey">Purchase Code</label>
      <input id="licenseKey" v-model="licenseKey"
             class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm" type="text">
      <div v-if="errors.licenseKey">{{ errors.licenseKey }}</div>
    </div>
    <PrimaryButton class="mt-4 w-full" type="submit" :disabled="processing">
      Verify License
    </PrimaryButton>
  </form>
</template>
