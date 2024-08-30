/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        fontFamily: {
            'logo': ['"Pacifico"', 'cursive'],
            'sans': ['"Noto Sans"', 'sans-serif'],
        }
    },
    plugins: [],
}
