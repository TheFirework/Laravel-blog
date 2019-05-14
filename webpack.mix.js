let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/laravel-admin.scss', 'public/css')
    .js('resources/assets/js/laravel-admin.js', 'public/js')
    .copy('resources/assets/images','public/images')
    .copyDirectory('resources/assets/laravel-admin', 'public/laravel-admin')
    .version();
