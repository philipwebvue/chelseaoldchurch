const mix = require('laravel-mix');

mix.options({
        processCssUrls: false
    }).copy([
        'node_modules/slick-carousel-latest/slick/slick.js',
        'node_modules/select2/dist/js/select2.js',
        'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
    ], 'assets/js')
    .js("resources/js/app.js", "assets/js")
    .postCss("resources/css/theme.css", "assets/css", [
        require("tailwindcss"),
    ]);