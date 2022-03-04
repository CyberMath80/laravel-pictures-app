const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.styles([
    'public/assets/css/style.css',
    'public/assets/css/components.css',
    ], 'public/css/all.css');

mix.scripts([
    'public/assets/js/stisla.js',
    'public/assets/js/scripts.js',
    'public/assets/js/custom.js',
    ], 'public/js/all.js')
.version();
