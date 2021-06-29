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

mix.js([
    'resources/js/clipboard.min.js',
    'resources/js/jquery.min.js',], 'public/admin-page/js')
    .autoload({
        jquery: ['jquery', 'jQuery', '$', 'window.jQuery'],
        clipboard: ['clipboard', 'clipboard', 'clipboard.js'],
    })
    .js('resources/js/detail-flugin.js', 'public/admin-page/js/detail-flugin')
    .js('resources/js/edit.js', 'public/admin-page/js/edit')
    .js('resources/js/setting.js', 'public/admin-page/js/setting')
    .js('resources/js/moment.js', 'public/admin-page/js/moment')
    .styles(['resources/css/app.css',
            'resources/css/media.css',
            'resources/css/style.css',
            'resources/css/theme.css',
        ], 'public/admin-page/css/all.css')
    .sourceMaps();
