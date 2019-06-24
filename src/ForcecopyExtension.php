<?php

namespace derekisbusy\forcecopy;

use yii\base\BootstrapInterface;

class ForcecopyExtension implements BootstrapInterface
{
    public function bootstrap($app)
    {
        if (!isset($app->modules['debug'])) {
            return;
        }

        $debug = $app->getModule('debug');
        $debug->controllerMap['forcecopy'] = 'derekisbusy\forcecopy\ForcecopyController';
        $forcecopy = $app->request->cookies->getValue('debug-forcecopy', 'Off');
        $app->assetManager->forceCopy = $forcecopy == 'On' ? true : false;
    }
}