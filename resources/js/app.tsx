import './bootstrap';
import '../css/index.css';
import "swiper/swiper-bundle.css";
import "flatpickr/dist/flatpickr.css";

import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ThemeProvider } from './Context/ThemeContext';
import { AppWrapper } from './Components/common/PageMeta';

const appName = import.meta.env.VITE_APP_NAME || 'Oasys School';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.tsx`, import.meta.glob('./Pages/**/*.tsx')),
    setup({ el, App, props }) {
        const root = createRoot(el as HTMLElement);

        root.render(
            <ThemeProvider>
                <AppWrapper>
                    <App {...props} />
                </AppWrapper>
            </ThemeProvider>
        );
    },
    progress: {
        color: '#4B5563',
    },
});