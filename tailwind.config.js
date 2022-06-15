/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  mode: 'jit',
  content: [
    "./src/resources/**/*.css",
    "./src/resources/**/*.scss",
    "./src/resources/**/*.js",
    "./resources/views/**/*.blade.php",    
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    },
  },

  plugins: [require('@tailwindcss/forms')],
}
