<?php

namespace derekisbusy\forcecopy;

use yii\base\Event;
use yii\base\View;
use yii\base\ViewEvent;
use yii\debug\Panel;
use yii\helpers\Url;


class ForcecopyPanel extends Panel
{
    private $_viewFiles = [];

    public function init()
    {
        parent::init();
        Event::on(View::className(), View::EVENT_BEFORE_RENDER, function (ViewEvent $event) {
            $this->_viewFiles[] = $event->sender->getViewFile();
        });
    }


    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Views';
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        $route = Url::to(['debug/forcecopy/switch']);
        $force = Yii::$app->cookies->getValue('debug-focecopy','Off');
        $html = <<<EOL

$('#debug-toolbar-forcecopy-link).on('click', function (e) {
    e.preventDefault();
    $.getJSON( "ajax/test.json", function( forcecopy ) {
      $('#debug-toolbar-forcecopy-link').html(forcecopy);
    });
});

<div class=\"yii-debug-toolbar__block\">         
    Forcecopy <span class=\"yii-debug-toolbar__label yii-debug-toolbar__label_info\"><a id="debug-toolbar-forcecopy-link" href="#">$forcecopy</a></span>
</div>
EOL;
        return $html;
        return "<a href=\"\">Views <span class=\"yii-debug-toolbar__label yii-debug-toolbar__label_info\">$count</span></a>";
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