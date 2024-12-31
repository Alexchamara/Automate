import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            skew: {
                '30': '-30deg',
            },
            transformOrigin: {
                'bottom': 'bottom',
            },
            boxShadow: {
                '3xl': '0px 17px 11px #80808099',
                '4xl': '0 0 19px 3px #80808099',
                '5xl': '0px 6px 15px #808080',
                '6xl': '0 4px 7px 0 #00000023, 0 .6px 2px 0 #0000001c',
            },
            backgroundImage: {
                'custom-gradient': 'linear-gradient(45deg, black, transparent)',
                'custom-gradient-hover': 'linear-gradient(45deg, red, transparent)',
            },
            colors: {
                customBlue: '#0b196f',
                customGray: '#6C757D',
                customRed: '#A82E23',
                hoverRed: '#D32F2F',
            },
            fontFamily: {
                'button': ['"Poppins", sans-serif'],
            },
        },
    },

    plugins: [
        function ({ addUtilities }) {
            addUtilities({
                '.skew-x-30': {
                    transform: 'skewX(-30deg)',
                },
                '.origin-bottom': {
                    'transform-origin': 'bottom',
                }
            }, ['responsive', 'hover']);
        }],
};
