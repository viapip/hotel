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

mix
    .js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/styles/style.sass', 'public/css');
    // .browserSync({
    //     watch: true,
    //     files: [
    //         'public/js/*',
    //         'public/css/*',
    //         // 'public/**/*.+(html|php)',
    //         // 'resources/views/**/*.php'
    //     ],
    //     open: "http://127.0.0.1:8000",
    //     injectChanges: true,
    //     // browser: "google chrome",
    //     reloadDelay: 1000,
    //     proxy: {
    //         target: "http://127.0.0.1:8000",
    //         ws: true,
    //     },
    // })
