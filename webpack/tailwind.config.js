/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: 'tw-',
  content: [
      "./../app/templates/**/*.blade.php",
      "./../*.php",
      "./src/*",
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}