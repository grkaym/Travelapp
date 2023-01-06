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

mix.js('resources/js/app.js', 'public/assets/auth/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/assets/auth/css');

// CSS生成
mix.sass('resources/scss/app.scss', 'public/assets/css')
    .js('resources/js/scroll.js', 'public/assets/js')
    .js('resources/js/slick.js', 'public/assets/js')
    .js('resources/js/main.js', 'public/assets/js')
    .autoload({
        'jquery':['$', 'window.jQuery'],
    });

// エラー時のみ通知
mix.disableSuccessNotifications();