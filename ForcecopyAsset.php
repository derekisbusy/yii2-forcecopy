<?php

namespace derekisbusy\forcecopy;

use yii\web\AssetBundle;

class ForcecopyAsset extends AssetBundle
{
    public $sourcePath = '@derekisbusy/forcecopy';
    public $js = [
        'forcecopy.js'
    ];
}