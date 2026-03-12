import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: 'var(--primary-color)',
                secondary: 'var(--secondary-color)',
                'bg-main': 'var(--bg-color)',
            },
            animation: {
                marquee: 'marquee 30s linear infinite',
            },
            keyframes: {
                marquee: {
                    '0%': { transform: 'translateX(200%)' },
                    '100%': { transform: 'translateX(-200%)' },
                },
            },
        },
    },

    plugins: [forms],
};
