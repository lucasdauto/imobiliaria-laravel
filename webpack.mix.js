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
    //sass login
    .sass('resources/views/admin/assets/scss/reset.scss', 'public/backend/assets/css/reset.css')
    .sass('resources/views/admin/assets/scss/boot.scss', 'public/backend/assets/css/boot.css')
    .sass('resources/views/admin/assets/scss/login.scss', 'public/backend/assets/css/login.css')

    //sass master
    .sass('resources/views/admin/assets/scss/style.scss', 'public/backend/assets/css/style.css')

    //css master
    .styles([
        'resources/views/admin/assets/js/datatables/css/jquery.dataTables.min.css',
        'resources/views/admin/assets/js/datatables/css/responsive.dataTables.min.css',
        'resources/views/admin/assets/js/select2/css/select2.min.css',
    ], 'public/backend/assets/css/libs.css')

    //scripts login
    .scripts(['resources/views/admin/assets/js/jquery.min.js'], 'public/backend/assets/js/jquery.js')
    .scripts(['resources/views/admin/assets/js/login.js'], 'public/backend/assets/js/login.js')

    //scripts master
    .scripts([
        'resources/views/admin/assets/js/datatables/js/jquery.dataTables.min.js',
        'resources/views/admin/assets/js/datatables/js/dataTables.responsive.min.js',
        'resources/views/admin/assets/js/select2/js/select2.min.js',
        'resources/views/admin/assets/js/select2/js/i18n/pt-BR.js',
        'resources/views/admin/assets/js/jquery.form.js',
        'resources/views/admin/assets/js/jquery.mask.js',
    ], 'public/backend/assets/js/libs.js')
    .scripts(['resources/views/admin/assets/js/scripts.js'], 'public/backend/assets/js/scripts.js')

    .copyDirectory('resources/views/admin/assets/images', 'public/backend/assets/images')
    .copyDirectory('resources/views/admin/assets/css/fonts', 'public/backend/assets/css/fonts')
    .copyDirectory('resources/views/admin/assets/js/datatables/js', 'public/backend/assets/js/datatable')
    .copyDirectory('resources/views/admin/assets/js/select2/js', 'public/backend/assets/js/select2')
    .copyDirectory('resources/views/admin/assets/js/tinymce', 'public/backend/assets/js/tinmymce')

    .options({
        processCssUrls: false
    })

    .version()
;
