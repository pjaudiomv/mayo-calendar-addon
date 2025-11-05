import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react()],
  define: {
    'process.env': {}
  },
  build: {
    outDir: 'assets/js/dist',
    emptyOutDir: true,
    lib: {
      entry: 'assets/js/src/calendar.jsx',
      name: 'MayoCalendar',
      formats: ['iife'],
      fileName: () => 'calendar.bundle.js'
    },
    rollupOptions: {
      external: ['react', 'react-dom', '@wordpress/element'],
      output: {
        globals: {
          'react': 'React',
          'react-dom': 'ReactDOM',
          '@wordpress/element': 'wp.element'
        }
      }
    }
  }
});
