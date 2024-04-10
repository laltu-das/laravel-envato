<script setup>
import {ref, computed} from 'vue';
import {Link} from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const currentStep = ref(1);

const steps = [
  {label: 'Getting Started', href: 'install.getting-started', component: 'GettingStarted'},
  {label: 'Requirements', href: 'install.server-requirements', component: 'ServerRequirements'},
  {label: 'Permissions', href: 'install.folder-permissions', component: 'FolderPermissions'},
  {label: 'Environment', href: 'install.environment-variables', component: 'EnvironmentVariables'},
  {label: 'License', href: 'install.envato-license', component: 'EnvatoLicense'},
  {label: 'Installation', href: 'install.installation-progress', component: 'InstallationProgress'},
];

</script>


<template>
  <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center">
    <ApplicationLogo class="h-16 mx-auto mb-6"/>

    <!-- Sidebar for steps -->
    <ul class="justify-between flex gap-3 mb-8 max-w-5xl">
      <li v-for="(step, index) in steps" :key="index" class="group">
        <Link :href="route(step.href)"
              class="flex items-center px-4 py-2 transition-colors duration-150 rounded-md shadow"
              :class="[$page.component.startsWith(step.component)?'bg-blue-500 text-white':' hover:bg-blue-100']">
                        <span class="inline-block w-8 h-8 text-center leading-8 rounded-full mr-2 bg-blue-200">
                            <i v-if="index < currentStep - 1" class="fas fa-check"></i>
                            <template v-else>{{ index + 1 }}</template>
                        </span>
          <span>{{ step.label }}</span>
        </Link>
      </li>
    </ul>

    <!-- Main content with adjusted width and card design -->
    <div class="bg-white shadow rounded p-8 mb-8 w-full max-w-5xl min-h-96 overflow-y-auto" style="height: 44rem">
      <slot/>
    </div>
  </div>
</template>
