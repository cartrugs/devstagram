/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // Los dos ** es un placeholder para que de forma recursiva vaya a las carpetas que estan dentro de resources
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    // JIT Mode (Just In Time). HAy que configurar dónde se aplican los estilos de tailwind debido al JIT Mode. En este caso a vendor/...
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

