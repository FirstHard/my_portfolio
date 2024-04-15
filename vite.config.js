import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    server: {
        https: true,
        host: "buynov.pp.ua",
    },
    plugins: [
        laravel({
            input: {
                admin: "resources/admin/assets/js/app.js",
                site: "resources/site/js/app.js",
                home: "resources/site/js/home.js"
            },
            refresh: true,
            sourcemap: false,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
            "~bootstrap": "node_modules/bootstrap",
            "~admin_assets": "resources/admin/assets",
        },
    },
});
