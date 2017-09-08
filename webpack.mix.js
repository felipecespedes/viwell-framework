let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .styles(['resources/assets/css/app.css'], 'public/css/app.css');