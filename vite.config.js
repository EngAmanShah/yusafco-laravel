import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
    'resources/css/app.css',
    'resources/js/app.js',
    'resources/js/on-page-editor.js', // <-- ADD THIS
    'resources/css/admin-edit-mode.css', // <-- ADD THIS
],
            refresh: true,
        }),
    ],
});
