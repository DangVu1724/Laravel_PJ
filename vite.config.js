import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        hmr: {
            host: process.env.CODESPACE_NAME 
                ? `${process.env.CODESPACE_NAME}-8000.app.github.dev` 
                : 'localhost',
            protocol: 'wss',
        },
        https: true,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
