module.exports = {
  "env": {
    "browser": true,
    "es2021": true
  },
  "extends": [
    "eslint:recommended",
    "plugin:vue/vue3-recommended",
    "plugin:@typescript-eslint/recommended",
    "prettier",
  ],
  "overrides": [
  ],
  "parser": "vue-eslint-parser",
  "parserOptions": {
    "ecmaVersion": 13,
    "parser": "@typescript-eslint/parser",
    "sourceType": "module"
  },
  "plugins": [
    "vue",
    "@typescript-eslint",
    // prettierをESLintと併用
    "prettier"
  ],
  "rules": {
    // ESLintが使用する整形ルールのうち、自分がoffにしたいルールなどを指定
    "vue/multi-word-component-names": "off",
    // prettierのルール調整
    "prettier/prettier": [
      "error",
      {
        "singleQuote": true,
        "semi": false,
        "trailingComma": "all",
        "printWidth": 120,
        "tabWidth": 2,
        "useTabs": false,
        "trailingComma": 'all',
        "bracketSpacing": true
      }
    ],
  }
}
