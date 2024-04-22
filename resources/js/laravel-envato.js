import { createApp } from 'vue';
import { createPinia } from 'pinia';
import axios from 'axios';
import { createRouter, createWebHistory } from 'vue-router';
import GettingStarted from "@/Pages/GettingStarted.vue";
import ServerRequirements from "@/Pages/ServerRequirements.vue";
import InstallationProgress from "@/Pages/InstallationComplete.vue";
import FolderPermissions from "@/Pages/FolderPermissions.vue";
import EnvironmentVariables from "@/Pages/EnvironmentVariables.vue";
import EnvatoLicense from "@/Pages/EnvatoLicense.vue";

const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const basePath = '/' + (window.LaravelEnvato.path || '');

const routerBasePath = basePath === '/' ? '/' : `${basePath}/`;

const routes = [
    { path: '/install', name: 'install.home', component: GettingStarted },
    { path: '/install/server-requirements', name: 'install.server-requirements', component: ServerRequirements },
    { path: '/install/folder-permissions', name: 'install.folder-permissions', component: FolderPermissions },
    { path: '/install/environment-variables', name: 'install.environment-variables', component: EnvironmentVariables },
    { path: '/install/envato-license', name: 'install.envato-license', component: EnvatoLicense },
    { path: '/install/installation-progress', name: 'install.installation-progress', component: InstallationProgress },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    base: routerBasePath,
});

const app = createApp({ props:window.LaravelEnvato },window.LaravelEnvato);
app.use(router).use(createPinia()).mount('#laravel-envato');

// Setting global headers from LaravelEnvato, if any
if (window.LaravelEnvato.headers) {
    for (const [key, value] of Object.entries(window.LaravelEnvato.headers)) {
        axios.defaults.headers.common[key] = value;
    }
}
