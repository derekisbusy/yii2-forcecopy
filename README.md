Yii2-forcecopy
==============
Adds a button to quickly turn forcecopy on/off in the asset manager .

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist derekisbusy/yii2-forcecopy "*"
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