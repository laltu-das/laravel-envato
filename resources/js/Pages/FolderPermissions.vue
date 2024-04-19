<script setup>
import { useRouter } from 'vue-router';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
  permissions: Object,
  errors: Object,
})

const router = useRouter();

const nextStep = () => {
  router.push({ name: 'install.environment-variables' });
}
</script>


<template>
        <h2 class="text-2xl font-bold text-center">Folder Permissions</h2>
        <div class="w-96 text-center m-auto my-4">
            <div v-for="permission in permissions" :key="permission.folder"
                 class="flex items-center p-1 bg-gray-50 rounded-md">
                      <span :class="permission.isWritable ? 'bg-green-200' : 'bg-red-200'"
                            class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full">
                        <svg v-if="permission.isWritable" class="w-6 h-6 text-green-600" fill="none"
                             stroke="currentColor"
                             stroke-width="1.5"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path d="M4.5 12.75l6 6 9-13.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg v-else class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                             stroke-width="1.5"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </span>
                <span class="ml-3 text-gray-700">
                    {{ permission.folder }} ({{ permission.permission }})
                </span>
            </div>

            <PrimaryButton @click="nextStep" class="w-full mt-4">
                Next Step
            </PrimaryButton>
        </div>

</template>

<style scoped>

</style>
