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

mix.js('resources/frontend/js/app.js', 'public/frontend/js/main.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.styles([
    'resources/admin/plugins/fontawesome-free/css/all.css',
    'resources/admin/css/adminlte.css',

],'public/assets/_admin/css/admin.css')

mix.scripts([

    'resources/admin/plugins/jquery/jquery.js',
    'resources/admin/plugins/bootstrap/js/bootstrap.bundle.js',
    'resources/admin/js/adminlte.js',
    'resources/admin/js/demo.js',
    'resources/admin/js/dashboard.js'

],'public/assets/_admin/js/admin.js');

mix.copyDirectory('resources/admin/plugins/fontawesome-free/webfonts','public/assets/_admin/webfonts');

mix.copyDirectory('resources/admin/img','public/assets/_admin/img');

mix.copyDirectory('resources/admin/css/adminlte.css.map','public/assets/_admin/css');

mix.copyDirectory('resources/admin/js/adminlte.js.map','public/assets/_admin/js');

mix.js('resources/admin/js/app.js', 'public/assets/_admin/js/').version();
