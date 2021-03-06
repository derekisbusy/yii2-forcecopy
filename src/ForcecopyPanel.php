<?php

namespace derekisbusy\forcecopy;

use Yii;
use yii\base\Application;
use yii\debug\Panel;
use yii\helpers\Url;

class ForcecopyPanel extends Panel
{
    private $_viewFiles = [];

    public function init()
    {
        parent::init();
        $app = Yii::$app;
        $app->on(Application::EVENT_BEFORE_REQUEST, function () use ($app) {
            ForcecopyAsset::register($app->getView());
        });
    }


    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Forcecopy';
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
//        $forcecopy = 'on';
        $forcecopy = Yii::$app->request->cookies->getValue('debug-forcecopy',Yii::$app->assetManager->forceCopy ? 'On' : 'Off');
        $url = Url::toRoute(['/'.$this->module->id.'/forcecopy/switch']);
        $html = <<<EOL
<div class="yii-debug-toolbar__block">         
    Forcecopy <span data-url="{$url}" id="debug-toolbar-forcecopy-link" class="yii-debug-toolbar__label yii-debug-toolbar__label_info" style="cursor: pointer">$forcecopy</span>
</div>

EOL;
        return $html;
    }

    /**
     * @inheritdoc
     */
    public function getDetail()
    {
        return '<ol><li>' . implode('<li>', $this->data) . '</ol>';
    }

    /**
     * @inheritdoc
     */
    public function save()
    {
        return $this->_viewFiles;
    }
}