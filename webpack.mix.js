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

mix.js('resources/js/app.js', 'public_html/js')
    .js('resources/js/main.js', 'public_html/js/app.js')
    .vue()
    .sass('resources/sass/app.sass', 'public_html/css')
    .options({
        processCssUrls:false
    });
//**************** CSS ********************
//css
//    // .js('resources/js/admin-app.js', 'public_html/js/admin')
mix.js('resources/js/admin-app.js', 'public_html/js/admin').vue();
mix.copy('node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css', 'public_html/css/admin');
mix.copy('node_modules/cropperjs/dist/cropper.css', 'public_html/css/admin');
//main css
mix.sass('resources/sass/admin-sass/style.scss', 'public_html/css/admin');

//************** SCRIPTS ******************
// general scripts
mix.copy('node_modules/@coreui/utils/dist/coreui-utils.js', 'public_html/js/admin');
mix.copy('node_modules/axios/dist/axios.min.js', 'public_html/js/admin');
//mix.copy('node_modules/pace-progress/pace.min.js', 'public_html/js');
mix.copy('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js', 'public_html/js/admin');
// views scripts
mix.copy('node_modules/chart.js/dist/Chart.min.js', 'public_html/js/admin');
mix.copy('node_modules/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js', 'public_html/js/admin');

mix.copy('node_modules/cropperjs/dist/cropper.js', 'public_html/js/admin');
// details scripts
mix.copy('resources/js/coreui/main.js', 'public_html/js/admin');
mix.copy('resources/js/coreui/colors.js', 'public_html/js/admin');
mix.copy('resources/js/coreui/charts.js', 'public_html/js/admin');
mix.copy('resources/js/coreui/widgets.js', 'public_html/js/admin');
mix.copy('resources/js/coreui/popovers.js', 'public_html/js/admin');
mix.copy('resources/js/coreui/tooltips.js', 'public_html/js/admin');
// details scripts admin-panel
mix.js('resources/js/coreui/menu-create.js', 'public_html/js/admin');
mix.js('resources/js/coreui/menu-edit.js', 'public_html/js/admin');
mix.js('resources/js/coreui/media.js', 'public_html/js/admin');
mix.js('resources/js/coreui/media-cropp.js', 'public_html/js/admin');
//*************** OTHER ******************
//fonts
mix.copy('node_modules/@coreui/icons/fonts', 'public_html/fonts');
//icons
mix.copy('node_modules/@coreui/icons/css/free.min.css', 'public_html/css/admin');
mix.copy('node_modules/@coreui/icons/css/brand.min.css', 'public_html/css/admin');
mix.copy('node_modules/@coreui/icons/css/flag.min.css', 'public_html/css/admin');
mix.copy('node_modules/@coreui/icons/svg/flag', 'public_html/svg/flag');

mix.copy('node_modules/@coreui/icons/sprites/', 'public_html/icons/sprites');
//images
mix.copy('resources/assets', 'public_html/assets');
