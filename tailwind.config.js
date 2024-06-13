/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './backend/views/**/*.php',
    './frontend/views/**/*.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('daisyui')
  ],
}

