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
            keyframes: {
                'pan-image': {
                    '0%': { transform: 'scale(1) translate(0, 0)' },
                    '100%': { transform: 'scale(1.1) translate(-2%, -2%)' },
                }
            },
            animation: {
                'pan-image': 'pan-image 40s linear infinite alternate',
            },
        },
    },

    plugins: [forms],
};
