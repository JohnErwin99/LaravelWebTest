const { lime, green, cyan, blue, purple, pink, rose } = require('tailwindcss/colors')
const colors = require('tailwindcss/colors')

module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
      fontFamily: {
        'Roboto': ['"Roboto"', 'sans-serif'],
        'Nunito': ["Nunito"]
      },
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        black: colors.black,
        white: colors.white,
        gray: colors.coolGray,
        red: colors.red,
        yellow: colors.amber,
        blue: colors.blue,
        blueGray:colors.blueGray,
        coolGray:colors.coolGray,
        trueGray:colors.trueGray,
        warmGray:colors.warmGray,
        orange:colors.oranger,
        amber:colors.amber,
        yellow:colors.yellow,
        lime:colors.lime,
        green:colors.green,
        emerald:colors.emerald,
        teal:colors.teal,
        cyan:colors.cyan,
        sky:colors.sky,
        indigo:colors.indigo,
        violet:colors.violet,
        purple:colors.purple,
        fushsia:colors.fuchsia,
        pink:colors.pink,
        rose:colors.rose,

      },
    },
  },
  variants: {
    opacity: ['disabled'],
    cursor: ['disabled'],
    backgroundColor:['disabled'],
  },
  plugins: [],
}
