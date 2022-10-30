import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import manifestSRI from 'vite-plugin-manifest-sri';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/users/main.js',
                'resources/js/admins/main.js'
            ],
            refresh: true,
        }),
        manifestSRI()
    ],
    resolve: {
        alias: {

        }
    }
});
