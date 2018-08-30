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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'public/theme/bootstrap/css/bootstrap.css',
    'public/theme/font-awesome/css/font-awesome.css',
    'public/theme/css/AdminLTE.css',
    'public/css/bootsnipp.css',
    'public/css/style.css'
], 'public/css/app.css');

mix.scripts([
    'public/theme/jquery/jquery.js',
    'public/theme/bootstrap/js/bootstrap.min.js',
    'public/theme/js/adminlte.js',
], 'public/js/app.js');
