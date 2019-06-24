<?php

namespace derekisbusy\forcecopy;

use Yii;

class ForcecopyController extends \yii\web\Controller
{
    public function actionSwitch()
    {
        $cookies = Yii::$app->request->cookies;
        $forcecopy = $cookies->getValue('debug-forcecopy', 'Off');
        
        if ($forcecopy == 'Off') {
            $forcecopy = 'On';
        } else {
            $forcecopy = 'Off';
        }
        Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'debug-forcecopy',
            'value' => $forcecopy,
        ]));
        
        return $forcecopy;
    }

}
