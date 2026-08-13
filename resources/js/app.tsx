import { createInertiaApp } from '@inertiajs/react';
import type { ComponentType } from 'react';
import { createRoot } from 'react-dom/client';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
    title: (title) => title || 'Tak Banyak Alasan',
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.tsx`,
            import.meta.glob('./Pages/**/*.tsx'),
        ) as Promise<ComponentType>,
    setup({ el, App, props }) {
        if (!el) return;
        createRoot(el).render(<App {...props} />);
    },
    progress: {
        color: '#CC1A1A',
        showSpinner: true,
    },
});
