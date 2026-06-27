const js = require("@eslint/js");
const security = require("eslint-plugin-security");
const globals = require("globals");

module.exports = [
  {
    ignores: [
      "node_modules/**",
      "vendor/**",
      "php-vendor/**",
      "reports/**"
    ]
  },
  js.configs.recommended,
  {
    files: [
      "script.js",
      "js/**/*.js",
      "tests/js/**/*.js",
      "eslint.config.js"
    ],
    languageOptions: {
      ecmaVersion: "latest",
      sourceType: "commonjs",
      globals: {
        ...globals.browser,
        ...globals.node,
        ...globals.jest
      }
    },
    plugins: {
      security
    },
    rules: {
      ...security.configs.recommended.rules
    }
  }
];