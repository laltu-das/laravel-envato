<script setup>

import {ref} from 'vue'
import {Link, router} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    requirements: Object
})

const requirements = ref(props.requirements)

const checkAgain = () => {
    router.reload()
}

</script>

<template>
        <h2 class="text-2xl font-bold text-center">Server Requirements Check</h2>
        <p class="text-lg text-gray-600 text-center my-4">
            Ensuring your server meets all the necessary requirements for
            Laravel.
        </p>
        <div class="w-96 text-center m-auto mt-4">

            <div v-for="(status, requirement) in requirements" :key="requirement"
                 class="flex items-center p-1 bg-gray-50 rounded-md">
                      <span :class="status ? 'bg-green-200' : 'bg-red-200'"
                            class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full">
                        <svg v-if="status" class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
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
                <span class="ml-3 text-gray-700">{{ requirement }}</span>
            </div>


            <div class="text-center mt-4 flex justify-between">
                <PrimaryButton @click="checkAgain">
                    Check Again
                </PrimaryButton>
                <Link :href="route('install.folder-permissions')"
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Next Step
                </Link>
            </div>
        </div>
</template>
