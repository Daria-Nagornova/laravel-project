const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'resources/js/tether.min.js',
        'resources/js/jquery.cookie.js',
        'resources/js/jquery.fancybox.min.js',
        'resources/js/animsition.min.js',
        'resources/js/front.js'
     ], 'public/js/app.js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
