Yii2 Markdown
=============
Yii2 markdown parser and editor

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist altiore/yii2-markdown "*"
```

or add

```
"altiore/yii2-markdown": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

1. Convert markdown to html:
```php
<?= \altiore\yii2\markdown\Markdown::convert($markdownText); ?>
```
2. Editor markdown in yii2 form:
```php
<?= $form->field($model, 'text')->widget(\altiore\yii2\markdown\MarkdownEditor::class) ?>
```
