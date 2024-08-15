/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // Los dos ** es un placeholder para que de forma recursiva vaya a las carpetas que estan dentro de resources
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

