import { defineConfig } from 'vite';
import { resolve } from 'path';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.ts',
                'resources/css/filament.css',
            ],

            refresh: true,
        }),

        vue(),
    ],

    resolve: {
        alias: {
            '~': resolve(__dirname, 'resources'),
        }
    }
});
