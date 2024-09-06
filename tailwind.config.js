/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      screens: {
        'xxs': '300px',
        'xs': '400px',
        'sm': '576px',
        'md': '960px',
        'lg': '1440px',
      },
    },
  },
  plugins: [],
}