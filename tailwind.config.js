const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
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
        },
    },
    colors: {
        green: {
            100: '#F0FFF4',
            200: '#C6F6D5',
            300: '#9AE6B4',
            400: '#68D391',
            500: '#48BB78',
            600: '#38A169',
            700: '#2F855A',
            800: '#276749',
            900: '#22543D',
        },
        },

    plugins: [require('@tailwindcss/forms')],
};
