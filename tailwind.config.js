import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                primary: {
                    50:  '#fdf8f0',
                    100: '#faefd8',
                    200: '#f4dab0',
                    300: '#ecc07f',
                    400: '#e2a04c',
                    500: '#d4842a',
                    600: '#b86820',
                    700: '#994e1e',
                    800: '#7c3f1f',
                    900: '#67341d',
                    950: '#38190b',
                },
                warm: {
                    50:  '#faf9f7',
                    100: '#f5f2ed',
                    200: '#ede7dc',
                    300: '#dfd5c5',
                    400: '#cbbba5',
                    500: '#b69f87',
                    600: '#9d8470',
                    700: '#836c5d',
                    800: '#6b5a4e',
                    900: '#584b43',
                    950: '#2e2622',
                },
                dark: {
                    DEFAULT: '#1a1714',
                    lighter: '#2d2924',
                    card: '#242019',
                }
            },
            animation: {
                'fade-in': 'fadeIn 0.5s ease-in-out',
                'slide-up': 'slideUp 0.6s ease-out',
                'float': 'float 6s ease-in-out infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
            },
        },
    },
    plugins: [],
};
