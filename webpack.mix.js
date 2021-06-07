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

/* Styles start */
mix.sass('resources/assets/admin/css/custom.scss', '../resources/assets/admin/css/custom.css')
mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.css',
    'resources/assets/admin/css/adminlte.css',
    'resources/assets/admin/css/custom.css',
], 'public/assets/admin/css/admin.css');
mix.copy('resources/assets/admin/css/adminlte.min.css.map', 'public/assets/admin/css/adminlte.min.css.map');
mix.copy('resources/assets/admin/css/adminlte.css.map', 'public/assets/admin/css/adminlte.css.map');
/* Styles and */

/* Scripts start */
mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.js',
    'resources/assets/admin/js/adminlte.js',
    'resources/assets/admin/js/demo.js',
], 'public/assets/admin/js/admin.js');
mix.copy('resources/assets/admin/plugins/jquery/jquery.min.map', 'public/assets/admin/js/jquery.min.map');
mix.copy('resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js.map', 'public/assets/admin/js/bootstrap.bundle.min.js.map');
mix.copy('resources/assets/admin/js/adminlte.min.js.map', 'public/assets/admin/js/adminlte.min.js.map');
mix.copy('resources/assets/admin/js/adminlte.js.map', 'public/assets/admin/js/adminlte.js.map');
/* Scripts end */

/* Copy some files start */
mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts', 'public/assets/admin/webfonts');
mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');
/* Copy some files end */
