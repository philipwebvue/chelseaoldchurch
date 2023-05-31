module.exports = {
    content: [
        './header.php',
        './footer.php',
        './index.php',
        './inc/*.php',
        './templates/*.php',
        './templates/*/*.php',
        './templates/**/*.php',
        './templates/components/*.php',
        './templates/components/*/*.php',
        './templates/components/**/*.php',
        './blocks/*.php',
        './blocks/*/*.php',
        './blocks/**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
    ],
    safelist: [
        'object-bottom',
        'object-center',
        'object-left',
        'object-left-bottom',
        'object-left-top',
        'object-right',
        'object-right-bottom',
        'object-right-top',
        'object-top',
    ],
    theme: {
        fluidFontSize: {
            'xs': [0.75, 0.75], //12px
            'sm': [0.875, 0.875], //14px
            'base': [1, 1.25], //20px
            'lg': [1, 1.5], //24px
            'xl': [1.25, 1.875],
            '2xl': [1.5, 2.5], //40px
            '3xl': [2, 2.75], //44px
            '4xl': [2.313, 4.063] //65px
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
            '3xl': '1630px',
        },
        fontFamily: {
            'theme': ['"serenity"', 'sans-serif'],
            'prata': ['"Prata"', 'serif'],
            'fontawesome': ['"Font Awesome 5 Free"'],
        },
        borderWidth: {
            DEFAULT: '3px',
            '0': '0',
            '2': '2px',
            '3': '3px',
            '4': '4px',
            '6': '6px',
            '8': '8px',
            '10': '10px',
        },
        extend: {
            aspectRatio: {
                '3/1': '3 / 1',
                '20/11': '20 / 11',
                '21/9': '21 / 9',
                '4/3': '4 / 3',
                '15/9': '15 / 9',
                'banner': '1676 / 650'
            },
            transitionDuration: {
                '0': '0ms',
                '2000': '2000ms',
            },
            colors: {
                'black' : '#000000',
                'white' : '#ffffff',
                'primary': {
                    DEFAULT:'#900942'
                },
                'secondary': {
                    DEFAULT:'#DDDBDB'
                },
            },
            spacing: {
                'breakout': 'calc(50% - 50vw)',
            },
            maxWidth: {
                'page': '1920px',
                'content': '1680px',
                'content-left': '1090px',
                'content-right':'540px',
                'content-single': '1115px',
                '3/5' : '60%',
                '1/2' : '50%',
                '1/3' : '33.33%',
            },
            minWidth: {
                '1/2': '50%',
                'nav-button':'100px',
            },
            minHeight: {
                'banner-image': '524px',
            },
            lineHeight: {
                'none': '1',
                'tight': '1.25',
                'snug': '1.375',
                'normal': '1.5',
                'relaxed': '1.625',
                'loose': '2'
            },
        },
    },
    corePlugins: {
        fontSize: false
    },
    plugins: [
        require("@wolves.ink/tailwindcss-fluid-fontsize")({
            screenMin: 20, // 20rem === 320px
            screenMax: 96, // 96rem === 1536px
            unit: "rem", // default is rem but it's also possible to use 'px'
            prefix: "", // set a prefix to use it alongside the default font sizes
        }),
    ]
}
