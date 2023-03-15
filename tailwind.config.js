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
                sans: ['Figtree', 'Poppins', ...defaultTheme.fontFamily.sans],
            },

            colors:{
                  primary:'#0067f3'
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('daisyui')
    ],

    daisyui: {
        themes: [
          {
            mytheme: {

                "primary": "#0067f3",

                "secondary": "#F000B8",

                "accent": "#37CDBE",

                "neutral": "#3D4451",

                "base-100": "#FFFFFF",

                "info": "#3ABFF8",

                "success": "#36D399",

                "warning": "#FBBD23",

                "error": "#F87272",
            },
          },
        ],
      },
};
