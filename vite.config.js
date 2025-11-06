import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/images/icoon1.png', 
        'resources/images/adly.jpg', 
      ],
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
