import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/welcome.css",
                "resources/css/app.css",
                "resources/css/about.css",
                "resources/css/service.css",
                "resources/css/sign.css",
                "resources/css/dashboard.css",
                "resources/css/advert.css",
                "resources/css/shop.css",
            ],
            refresh: true,
        }),
    ],
});
