const mix = require('laravel-mix');

mix.js("resources/js/app.js", "assets/js")
    .postCss("resources/css/theme.css", "assets/css", [
        require("tailwindcss"),
    ]);