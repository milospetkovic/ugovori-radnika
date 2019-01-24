const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');


    mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/fonts');

    mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/fonts/bootstrap');


    mix.copy('resources/assets/vendor/datetimepicker/css/bootstrap-datetimepicker.css', 'public/css');
    mix.copy('resources/assets/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js', 'public/js');

    // mix.copy('resources/assets/vendor/moment/js/moment-with-locales.min.js', 'public/js');
    // mix.copy('resources/assets/vendor/moment/js/moment-timezone-with-data.min.js', 'public/js');

    mix.copy('resources/assets/styles/elitasoft.css', 'public/css/elitasoft.css');
});
