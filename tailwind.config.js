/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "*.{html,php,js}",
    "partials/*.{html,php,js}",
    "admin/*.{html,php,js}",
  ],
  theme: {
    extend: {
      fontFamily: {
        montserrat: ["Montserrat", "sans-serif"],
      },
    },
  },
  plugins: [],
};
