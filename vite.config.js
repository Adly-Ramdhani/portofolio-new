import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 
              'resources/js/app.js',
              'resources/css/login.css',
              'resources/css/admin.css'],
      refresh: true,
      buildDirectory: 'build',
    }),
    tailwindcss(),
  ],
  build: {
    outDir: 'public/build',  
    manifest: true,          
    emptyOutDir: true,       
  },
})
