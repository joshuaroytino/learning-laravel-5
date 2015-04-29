var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less', 'resources/css');

    mix.styles([
        'app.css',
        'libs/select2.min.css'
    ], 'public/css/stylesheet.css');

    mix.scripts([
        'libs/jquery.js',
        'libs/bootstrap.min.js',
        'libs/select2.min.js'
    ], 'public/js/script.js');

    mix.scripts([
        'libs/html5shiv.min.js',
        'libs/respond.min.js'
    ], 'public/js/scripts-ie.js');

    mix.version(['public/css/stylesheet.css', 'public/js/script.js', 'public/js/scripts-ie.js']);
});
