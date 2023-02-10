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
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            height: {
                "10vh":"10vh",
                "15vh":"15vh",
                "65vh":"65vh"
            },

            backgroundColor:{
                "azul_pastel": "#3A506B",
                "azul_marino": "#1C2541"
            },

            textColor: {
                "white":"white"

            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
