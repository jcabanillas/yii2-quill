# yii2-quill

![Latest Stable Version](https://img.shields.io/packagist/v/bizley/quill.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/bizley/quill.svg)](https://packagist.org/packages/bizley/quill)
![License](https://img.shields.io/packagist/l/bizley/quill.svg)

*Yii 2 implementation of Quill, modern WYSIWYG editor.*

## Quill

You can find Quill at https://quilljs.com/  
- [Documentation](https://quilljs.com/docs/quickstart/)
- [Guides](https://quilljs.com/guides/why-quill/)
- [Playground](https://quilljs.com/playground/)
- [GitHub](https://github.com/quilljs/quill)

## yii2-quill

### Installation

Run console command

```
composer require bizley/quill:^3.3
```

Or add the package to your `composer.json`:

```json
{
    "require": {
        "bizley/quill": "^3.3"
    }
}
```

and run `composer update`.

### NPM Assets

This package might depend on some NPM packages. Make sure you can fetch them by configuring your 
`composer.json` properly (i.e. by using https://asset-packagist.org/ - see instructions there).

### Usage

Use it as an active field extension  

```php
<?= $form->field($model, $attribute)->widget(\bizley\quill\Quill::class, []) ?>
```

Or as a standalone widget

```php  
<?= \bizley\quill\Quill::widget(['name' => 'editor', 'value' => '']) ?>
```

### Basic parameters

 - **theme** *string* default `'snow'`  
   `'snow'` (`Quill::THEME_SNOW`) for Quill's [snow theme](https://quilljs.com/docs/themes/#snow),  
   `'bubble'` (`Quill::THEME_BUBBLE`) for Quill's [bubble theme](https://quilljs.com/docs/themes/#bubble),  
   `false` or `null` to remove theme (you might need to provide your own toolbar in case of no theme).  
   See [Quill's documentation for themes](https://quilljs.com/docs/themes/).

 - **toolbarOptions** *boolean|string|array* default `true`  
   `true` for theme's default toolbar,  
   `'FULL'` (`Quill::TOOLBAR_FULL`) for full Quill's toolbar,  
   `'BASIC'` (`Quill::TOOLBAR_BASIC`) for few basic toolbar options,  
   *array* for toolbar configuration (see below).  

### Toolbar

Quill's toolbar from version 1.0 can be easily configured with custom set of buttons.  
See [Toolbar module](https://quilljs.com/docs/modules/toolbar/) documentation for details.

You can pass PHP array to `'toolbarOptions'` parameter to configure this module (it will be JSON-encoded).

For example, to get:

```js
new Quill('#editor', {
    modules: {
        toolbar: [['bold', 'italic', 'underline'], [{'color': []}]]
    }
});
```

add the following code in widget configuration:

```php
[
    'toolbarOptions' => [['bold', 'italic', 'underline'], [['color' => []]]],
],
```

## Additional information

### Container and form's inputs

Quill editor is rendered in `div` container (this can be changed by setting `'tag'` parameter) and edited content is 
copied to hidden input field so it can be used in forms. You can modify container's HTML attributes by setting 
`'options'` parameter and hidden field HTML attributes by setting `'hiddenOptions'` parameter. 

### Editor box's height

When `allowResize` option is set to `false` (default) editor's height is *150px* (this can be changed by setting 
`'options'` parameter). Setting `allowResize` to `true` resets the minimum height and allows it to be expanded freely. 
Editor's box extends as new text lines are added.

### Quill source

By default, Quill is provided through the CDN (https://cdn.quilljs.com). You can change the Quill's version set with the 
current yii2-quill's release by changing `'quillVersion'` parameter but some options may not work correctly in this case. 
Starting from version 3.0.0 you can use local assets for Quill provided through NPM packet manager - to do 
so run

```
composer require npm-asset/quill:^1.3
```

Or add the package to your `composer.json`:

```json
{
    "require": {
        "npm-asset/quill": "^1.3"
    }
}
```

You also need to set `['localAssets' => true]` in Quill's configuration.

### Additional JavaScript code

You can use parameter `'js'` to append additional JS code.  
For example, to disable user input Quill's API provides this JS:

```js
quill.enable(false);
```

To get the same through widget's configuration add the following code:

```php
[
    'js' => '{quill}.enable(false);',
],
```

`{quill}` placeholder will be automatically replaced with the editor's object variable name.  
For more details about Quill's API visit https://quilljs.com/docs/api/

### Formula module

Quill can render math formulas using the [KaTeX](https://khan.github.io/KaTeX/) library.  
To add this option configure widget with [Formula module](https://quilljs.com/docs/modules/formula/):

```php
[
    'modules' => [
        'formula' => true, // Include formula module
    ],
    'toolbarOptions' => [['formula']], // Include button in toolbar
]
```

By default, KaTeX is provided through the CDN (https://cdn.jsdelivr.net). You can change the version of KaTeX by setting 
the `'katexVersion'` parameter. Starting from version 3.0.0 you can use local assets for KaTeX provided through NPM 
packet manager - to do so run

```
composer require npm-asset/katex:^0.15
```

Or add the package to your `composer.json`:

```json
{
    "require": {
        "npm-asset/katex": "^0.15"
    }
}
```

You also need to set `['localAssets' => true]` in Quill's configuration.

### Syntax Highlighter module

Quill can automatically detect and apply syntax highlighting using the [highlight.js](https://highlightjs.org/) library.
To add this option configure widget with [Syntax Highlighter module](https://quilljs.com/docs/modules/syntax/):

```php
[
    'modules' => [
        'syntax' => true, // Include syntax module
    ],
    'toolbarOptions' => [['code-block']] // Include button in toolbar
]
```

By default, highlight.js is provided through the CDN (https://cdn.jsdelivr.net). You can change the version of 
highlight.js by setting the `'highlightVersion'` parameter. Starting from version 3.0.0 you can use local assets for 
highlight.js provided through NPM packet manager - to do so run

```
composer require npm-asset/highlight.js:^11.4
```

Or add the package to your `composer.json`:

```json
{
    "require": {
        "npm-asset/highlight.js": "^11.4"
    }
}
```

You also need to set `['localAssets' => true]` in Quill's configuration.

You can change the default highlight.js stylesheet (for both CDN and local version) by setting the `'highlightStyle'` 
parameter. See [the list of possible styles](https://github.com/isagalaev/highlight.js/tree/master/src/styles).

### Smart Break module

You can add Smart Break (support for shift + enter) by using the 
[quill-smart-break](https://github.com/simialbi/quill-smart-break/) plugin:

```php
[
    'modules' => [
        'smart-breaker' => true,
    ],
]
```

Starting from version 3.1.0 quill-smart-break is provided through NPM packet manager by local asset. For 
previous versions you would have to add it through custom JS (see `js` property).  
Run

```
composer require npm-asset/quill-smart-break:^0.2
```

Or add the package to your `composer.json`:

```json
{
    "require": {
        "npm-asset/quill-smart-break": "^0.2"
    }
}
```

You also need to set `['localAssets' => true]` in Quill's configuration.
