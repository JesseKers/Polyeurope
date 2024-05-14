/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        customBlue: '#357aba',
        customLightBlue: '#8fcce9',
        customSuperLightBlue: '#c4e1f2',
      },
    },
  },
  plugins: [],
}

