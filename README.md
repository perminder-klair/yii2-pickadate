pickadate.js for Yii2
=====================

pickadate.js Extention for Yii2

The mobile-friendly, responsive, and lightweight jQuery date & time input picker.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist perminder-klair/yii2-pickadate "*"
```

or add

```
"perminder-klair/yii2-pickadate": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \kato\pickadate\Pickadate::widget([
      'isTime' => true,
      'pickadateOptions' => [
          'formatSubmit' => 'HH:i',
      ],
  ]); ?>```


To use with active form :

```php
<?= $form->field($model, 'time-field')->widget(\kato\pickadate\Pickadate::classname(), [
    'isTime' => true,
    'pickadateOptions' => [
        'formatSubmit' => 'HH:i',
    ],
]); ?>```