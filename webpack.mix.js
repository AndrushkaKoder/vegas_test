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
//frontend
mix.js('resources/frontend/js/app.js', 'public/frontend/js/main.js')
	.sass('resources/sass/app.scss', 'public/assets/frontend/css')
	.sourceMaps();


//admin
mix.js('resources/admin/js/app.js', 'public/assets/_admin/js/app.js')
	.sass('resources/admin/css/app.scss', 'public/assets/_admin/css');


mix.copyDirectory('resources/admin/plugins/fontawesome-free/webfonts', 'public/assets/_admin/webfonts');
mix.copyDirectory('resources/admin/img', 'public/assets/_admin/img');

