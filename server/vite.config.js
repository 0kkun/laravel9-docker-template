import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import tsconfigPaths from 'vite-tsconfig-paths'

// NOTE: https://ja.vitejs.dev/config/server-options.html
export default defineConfig({
  plugins: [
    vue(),
    laravel({
      input: ['resources/sass/app.scss', 'resources/js/app.ts'],
      refresh: true,
    }),
    tsconfigPaths(),
  ],
  server: {
    host: true,
    hmr: {
      host: 'localhost',
    },
    // proxy: {
    //   '/api': {
    //     target: 'https://localhost',
    //     changeOrigin: true,
    //     rewrite: (path) => path.replace(/^\/api/, '')
    //   },
    // },
  },
  resolve: {
    alias: {
      '@': `${__dirname}/resources/js`,
    },
  },
});
