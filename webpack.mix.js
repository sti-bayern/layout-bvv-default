let mix = require('laravel-mix');
require('mix-tailwindcss');

mix.js('src/resources/js/app.js', 'resources/dist/js')
   .sass('src/resources/sass/app.scss', 'resources/dist/css')
   .postCss(
       'src/resources/css/app.css',
       'src/resources/dist/css',
       [
           require('postcss-import'),
           require('tailwindcss'),
           require('autoprefixer'),
       ]
   )
   .tailwind();