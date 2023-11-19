const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    safelist: [
        "sm:max-w-sm",
        "sm:max-w-md",
        "sm:max-w-lg",
        "sm:max-w-xl",
        "sm:max-w-2xl",
        "sm:max-w-3xl",
        "sm:max-w-4xl",
        "sm:max-w-5xl",
        "sm:max-w-6xl",
        "sm:max-w-7xl",

        "lg:max-w-sm",
        "lg:max-w-md",
        "lg:max-w-lg",
        "lg:max-w-xl",
        "lg:max-w-2xl",
        "lg:max-w-3xl",
        "lg:max-w-4xl",
        "lg:max-w-5xl",
        "lg:max-w-6xl",
        "lg:max-w-7xl"
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                brand: {
                    50: 'var(--color-brand-50)',
                    100: 'var(--color-brand-100)',
                    200: 'var(--color-brand-200)',
                    300: 'var(--color-brand-300)',
                    400: 'var(--color-brand-400)',
                    500: 'var(--color-brand-500)',
                    600: 'var(--color-brand-600)',
                    700: 'var(--color-brand-700)',
                    800: 'var(--color-brand-800)',
                    900: 'var(--color-brand-900)',
                },
                dark: {
                    primary: '#151522',
                    secondary: '#22222F',
                    accent: '#282834',
                },
                danger: colors.rose,
                primary: colors.indigo,
                success: colors.green,
                warning: colors.yellow,
                background: '#FAFAFA',
                facebook: '#1877f2',
                discord: '#5865F2'
            },
            boxShadow: {
                'default': '0 5px 10px rgb(55 55 89 / 8%)',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        function ({ addComponents }) {
            addComponents({
                '.container': {
                    width: '100%',
                    paddingLeft: '1rem',
                    paddingRight: '1rem',
                    '@screen sm': {
                        maxWidth: '640px',
                    },
                    '@screen md': {
                        maxWidth: '768px',
                    },
                    '@screen lg': {
                        maxWidth: '1024px',
                    },
                    '@screen xl': {
                        maxWidth: '1280px',
                    },
                }
            })
        }
    ],
}
