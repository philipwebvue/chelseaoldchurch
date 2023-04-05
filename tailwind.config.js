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
        './resources/css/*.css',
        './resources/js/*.js',
    ],
    theme: {
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
            '3xl': '1630px',
        },
        fontFamily: {
            'theme': ['"Barlow"', 'sans-serif'],
            'times-new-roman': ['"Times New Roman"', 'Times', 'serif'],
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
            },
            transitionDuration: {
                '0': '0ms',
                '2000': '2000ms',
            },
            colors: {
                'black' : '#2E2E2D',
                'white' : '#ffffff',
                'primary': {
                    DEFAULT:'#0082ca'
                },
                'secondary': {
                    DEFAULT:'#54585a'
                },
            },
            spacing: {
                'breakout': 'calc(50% - 50vw)',
            },
            maxWidth: {
                'page': '1920px',
                'content': '1630px',
                'content-left': '1090px',
                'content-right':'540px',
                'content-single': '948px',
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
        require('tailwindcss-fluid-type')({
            // your fluid type settings
            // works only with unitless numbers
            // This numbers are the defaults settings
            settings: {
                fontSizeMin: 1.125, // 1.125rem === 18px
                fontSizeMax: 1.25, // 1.25rem === 20px
                ratioMin: 1.125, // Multiplicator Min
                ratioMax: 1.2, // Multiplicator Max
                screenMin: 20, // 20rem === 320px
                screenMax: 96, // 96rem === 1536px
                unit: 'rem', // default is rem but it's also possible to use 'px'
                prefix: '', // set a prefix to use it alongside the default font sizes
                extendValues: true, // When you set extendValues to true it will extend the default values. Set it to false to overwrite the values.
            },
            // Creates the text-xx classes
            // This are the default settings and analog to the tailwindcss defaults
            // Each `lineHeight` is set unitless and we think that's the way to go especially in context with fluid type.
            values: {
                'xs': [-2, 1.5],
                'sm': [-1, 1.5],
                'base': [0, 1.5],
                'lg': [1, 1.5],
                'xl': [2, 1.5],
                '2xl': [3, 1.5],
                '3xl': [4, 1.2],
                '4xl': [5, 1.1],
                '5xl': [6, 1.1],
                '6xl': [7, 1.1],
                '7xl': [8, 1],
                '8xl': [9, 1],
                '9xl': [10, 1],
            },
        }),
    ],
    variants: {
        fluidType: ['responsive']
    }
}
