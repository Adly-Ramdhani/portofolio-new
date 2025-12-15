import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css', 
        'resources/js/app.js',
        'resources/css/login.css',
        'resources/css/admin.css'
      ],
      refresh: true,
      buildDirectory: 'build',
    }),
    tailwindcss(),
  ],

  // ⬇️ INI WAJIB
  server: {
    host: '127.0.0.1',
    port: 5173,
    https: false,
  },

  build: {
    outDir: 'public/build',
    manifest: true,
    emptyOutDir: true,
  },
})
