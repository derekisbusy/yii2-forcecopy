<?php

namespace derekisbusy\forcecopy;

class ForcecopyController extends \yii\web\Controller
{
    public function actionSwitch()
    {
        $cookies = Yii::$app->cookies;
        $forcecopy = $cookies->getValue('debug-forcecopy', 'Off');
        
        if ($forcecopy == 'Off') {
            $forcecopy = 'On';
        } else {
            $forcecopy = 'Off';
        }
        $cookies->add(new \yii\web\Cookie([
            'name' => 'debug-forcecopy',
            'value' => $forcecopy,
        ]));
        
        return $forcecopy;
    }

}
