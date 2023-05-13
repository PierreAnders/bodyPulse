/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        'comfortaa': ['Comfortaa', 'sans-serif'],
        'roboto': ['Roboto', 'sans-serif'],
        'roboto-slab': ['Roboto Slab', 'serif'],
      },
      keyframes: {
        heartbeat: {
          '0%': { transform: 'scale(1)' },
          '20%': { transform: 'scale(1.1)' },
          '40%': { transform: 'scale(1)' },
        }
      },
      animation: {
        heartbeat: 'heartbeat 1s infinite',
      }
    },
  },
  plugins: [
    function({ addUtilities }) {
      const newUtilities = {
        '.underline-offset-4': {
          textDecoration: 'underline',
          textUnderlineOffset: '4px',
        },
      }

      addUtilities(newUtilities)
    }
  ],
}
