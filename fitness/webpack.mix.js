let mix = require('laravel-mix');

mix.js('src/js/app.js', 'js').vue();

mix.sass('src/sass/main.sass', 'css')
   .options({
      processCssUrls: false
   });

mix.copy('src/fonts/*', 'dist/fonts')

mix.copy('src/images/*', 'dist/images');
mix.version();


mix.setPublicPath('dist');