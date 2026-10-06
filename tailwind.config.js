/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Filament/**/*.php"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', 'sans-serif'],
                mono: ['JetBrains Mono', 'monospace'],
            },
            colors: {
                primary: {
                    DEFAULT: '#D4AF37',
                    light: '#FFD700',
                    dark: '#AA8C2C',
                },
                secondary: {
                    DEFAULT: '#C0C0C0',
                    light: '#E5E7EB',
                    dark: '#9CA3AF',
                }
            }
        },
    },
    plugins: [],
};
