/** @type {import('vite').UserConfig} */
export default {
    build: {
        assetsDir: "",
        rollupOptions: {
            input: ["resources/js/laravel-envato.js", "resources/css/laravel-envato.css"],
            output: {
                assetFileNames: "[name][extname]",
                entryFileNames: "[name].js",
            },
        },
    },
};