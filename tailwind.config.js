/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
  content: ['./admin/*.php', './user/*.php', './php/*.php', , '*.php', './node_modules/flowbite/**/*.js'],
  theme: {
    colors: {
      'main': '#C4203C',
      'secondary': '#404040',
      'light': '#FFFFFF',
      'light-100': '#F5F5F5',
      'light-200': '#D9D9D9',
      'dark': '#000000',
      'success': '#0B8517',
      'blue': '#1A73E8'
    },
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

