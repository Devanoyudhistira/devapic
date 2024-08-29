// @type {import('tailwindcss').Config} 
module.exports = {
  content: ["./index.php","./App/views/*.{html,js,php}"],
  safelist: ["scale-100"],
  theme: {
    extend: {
      'fontFamily': {
        'inter' : 'inter',
        'sofia' : 'sofia',
        'poppins' : 'poppins',
        'caveat' : 'Caveat Brush',
        'bubblegum' : 'Bubblegum Sans'
      },
    },
  },
  plugins: [],
}

