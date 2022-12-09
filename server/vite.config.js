import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.ts'],
            refresh: true,
        }),
    ],
    server: {
        host: true,
        hmr: {
            host: 'localhost',
        },
        // css差分監視ビルドを行いたい場合
        // watch: {
        //     usePolling: true,
        // },
    },
    resolve: {
        alias: {
            '@': '/resources/ts',
        },
    },
});
