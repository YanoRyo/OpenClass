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


mix
    .js([
        'resources/js/app.js',
        // 'resources/js/assets/test_jquery.js',
        'resources/js/assets/Uusers/users.js',
        'resources/js/assets/organization/org.js',
        'resources/js/assets/chart.js',
    ], 'public/js/app.js')
    // .scripts('resources/js/assets/test_vanilla.js','public/js/test_vanilla.js')
    // .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/users/usersMaster.scss', 'public/css')
    .sass('resources/sass/organization/orgMaster.scss', 'public/css');