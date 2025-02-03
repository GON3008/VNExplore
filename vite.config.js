import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
    server: {
        host: 'vnexplore.test', // Domain ảo của bạn
        port: 5173, // Giữ nguyên hoặc đổi nếu cần
        hmr: {
            host: 'vnexplore.test',
            protocol: 'ws',
        }
    }
});
