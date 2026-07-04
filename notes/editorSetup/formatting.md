To correctly format Livewire 4.x multi-syntax single-file components with the Format Document command, Prettier must be paired with prettier-plugin-blade. This specific plugin relies on shufo/blade-formatter, which natively breaks down your single file into individual tokens. It independently passes HTML, Tailwind CSS, JS (Vanilla/Alpine), and standard CSS to Prettier while isolating and formatting the PHP blocks. [1]
Follow this complete setup guide to get every syntax block formatting perfectly.
## 1. Install Dependencies
Run the command below in your project root folder to install the parser engine and its Tailwind integrations:

npm install --save-dev prettier prettier-plugin-blade prettier-plugin-tailwindcss

## 2. Configure .prettierrc
Create or modify your .prettierrc file in the project root. You must register the plugins and enforce the blade parser specifically for these files so Prettier knows how to tokenize the multi-syntax structure:

{
  "printWidth": 120,
  "tabWidth": 4,
  "useTabs": false,
  "semi": true,
  "singleQuote": true,
  "trailingComma": "none",
  "bracketSpacing": true,
  "arrowParens": "always",
  "plugins": [
    "prettier-plugin-blade",
    "prettier-plugin-tailwindcss"
  ],
  "overrides": [
    {
      "files": [
        "*.blade.php"
      ],
      "options": {
        "parser": "blade"
      }
    }
  ]
}

## 3. Add the Core Engine Configuration (.bladeformatterrc.json)
The underlying engine for the blade plugin needs its own configuration file (.bladeformatterrc.json) in your root directory. This tells the parser to correctly handle and format the mixed script, PHP, and style blocks embedded within your single-file component:

{
  "write": true,
  "indentSize": 4,
  "wrapLineLength": 120,
  "wrapAttributes": "auto",
  "sortTailwindClasses": true,
  "sortAttributes": "none",
  "noCustomDirectives": false,
  "noPhpSyntaxCheck": false
}

## 4. Enforce VS Code Settings
To override standard PHP formatters (which will corrupt HTML) and standard HTML formatters (which will corrupt PHP), configure your local workspace settings. [2, 3]
Create or edit .vscode/settings.json:

{
  "editor.defaultFormatter": "esbenp.prettier-vscode",
  "editor.formatOnSave": true,
  "files.associations": {
    "*.blade.php": "blade"
  },
  "[blade]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode",
    "editor.formatOnSave": true
  }
}

## How this processes your specific file format:

*
* The <?php ... ?> top block: The extension calls the internal PHP tokenizer, using standard PRS alignment conventions for the Livewire 4 class declaration and properties.
* The HTML & Blade directives: Standard markup is structured cleanly, while Blade comments ({{-- ... --}}) are preserved safely.
* Tailwind CSS Utility Classes: Classes listed inside your class="..." expressions are systematically re-sorted via prettier-plugin-tailwindcss. [1]
* The <style> block: Extracted and sent directly to Prettier's CSS parser engine to clean up nested CSS styling rules.
* The <script> block: Extracted and passed through the JavaScript compiler, ensuring your Alpine.data() configurations maintain exact JavaScript indentation conventions.
*

Would you like help creating a custom VS Code snippet stub to quickly scaffold new Livewire 4 single-file components with these blocks preset? [4]

[1] [https://mattstauffer.com](https://mattstauffer.com/blog/how-to-set-up-prettier-on-a-laravel-app-to-lint-tailwind-class-order-and-more/)
[2] [https://stackoverflow.com](https://stackoverflow.com/questions/32236030/format-code-command-for-php-html-in-visual-studio-code)
[3] [https://stackoverflow.com](https://stackoverflow.com/questions/41330707/how-can-i-format-php-files-with-html-markup-in-visual-studio-code)
[4] [https://medium.com](https://medium.com/@moonwalkerdev/refuel-your-development-visual-studio-code-snippets-for-livewire-and-alpine-js-202b8dd74d0c)
