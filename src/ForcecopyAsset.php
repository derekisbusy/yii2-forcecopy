<?php

namespace derekisbusy\forcecopy;

use yii\web\AssetBundle;

class ForcecopyAsset extends AssetBundle
{
    public $sourcePath = '@derekisbusy/forcecopy/js';
    public $js = [
        'forcecopy.js'
    ];
}