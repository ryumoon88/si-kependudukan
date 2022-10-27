import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/users/main.js',
                'resources/js/admins/main.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            // 'bootstrap-icons': path.resolve(__dirname, 'node_modules/bootstrap-icons'),
            // 'remixicon': path.resolve(__dirname, 'node_modules/remixicon')
        }
    }
});
