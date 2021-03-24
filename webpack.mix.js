const mix = require('laravel-mix');
// const tailwindcss = require('mix-tailwindcss');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.react('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
   // .options({ // 追加
   //       processCssUrls: false, // 追加
   //       postCss: [ tailwindcss('./tailwind.config.js') ], // 追加
   //   }); 