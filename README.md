# Yii2-forcecopy

[![Latest Release](https://img.shields.io/github/release/derekisbusy/yii2-forcecopy.svg?style=flat-square)]()
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/derekisbusy/yii2-forcecopy.svg?style=flat-square)](https://packagist.org/packages/derekisbusy/yii2-forcecopy)


Adds a button to quickly turn [forceCopy](http://www.yiiframework.com/doc-2.0/yii-web-assetmanager.html#$forceCopy-detail) on/off in the debug toolbar.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist --dev derekisbusy/yii2-forcecopy "*"
```

or add

```
"derekisbusy/yii2-forcecopy": "*"
```

to the require section of your `composer.json` file.


Setup Config
------------

Add the forcecopy panel to the debug panels list in your configuration file  :

```php
    'debug' => [
        'class' => 'yii\debug\Module',
        'panels' => [
            'forcecopy' => ['class' => 'derekisbusy\forcecopy\ForcecopyPanel']
        ]
    ],
```

Usage
-----

The extension will add a section to the debug toolbar indicating whether or not forceCopy is on or off. 
Click the forcecopy status label to change it's state on or off.
