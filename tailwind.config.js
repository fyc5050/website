const colors = require('tailwindcss/colors');
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.{vue,ts}',
    ],
  theme: {
    extend: {
        colors: {
            primary: {
                DEFAULT: '#D40026',
                '50': '#FF8DA1',
                '100': '#FF7890',
                '200': '#FF4F6F',
                '300': '#FF274D',
                '400': '#FD002D',
                '500': '#D40026',
                '600': '#9C001C',
                '700': '#640012',
                '800': '#2C0008',
                '900': '#000000'
            },

            gray: colors.neutral,
        },

        fontFamily: {
            sans: ['Inter', ...defaultTheme.fontFamily.sans],
            display: ['Lexend', ...defaultTheme.fontFamily.sans],
        },

        animation: {
            hover: 'hover 2s linear infinite',
        },

        keyframes: {
            hover: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-10px)' },
            },
        },
    },
  },
  plugins: [],
}
