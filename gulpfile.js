var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    var bowerPath = '../../../vendor/bower_components/';

    mix
        .styles(['style.css'])
        .scripts([
            bowerPath + 'jquery/dist/jquery.min.js',
            bowerPath + 'bootstrap/dist/js/bootstrap.min.js',
            bowerPath + 'jquery-ujs/src/rails.js'
        ], 'public/js/vendor.js');
});
