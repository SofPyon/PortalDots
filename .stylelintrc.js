module.exports = {
  extends: [
    'stylelint-config-standard',
    'stylelint-config-prettier',
    'stylelint-config-recommended-vue',
    'stylelint-config-recommended-vue/scss',
    'stylelint-config-standard-scss',
  ],
  plugins: ['stylelint-order', 'stylelint-scss'],
  ignoreFiles: ['resources/sass/v2/_normalize.scss'],
  rules: {
    'at-rule-no-unknown': null,
    'scss/at-rule-no-unknown': true,
    'order/properties-alphabetical-order': true,
    'no-empty-source': null,
    'rule-empty-line-before': [
      'always',
      {
        except: 'inside-block',
      },
    ],
  },
}
