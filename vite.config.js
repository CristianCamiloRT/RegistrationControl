import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/demo.min.css',
                'resources/js/app.js',
                'resources/js/demo-theme.min.js',
                'resources/js/tabler.min.js',
                'resources/js/demo.min.js'
            ],
            refresh: true,
        }),
    ],
});
