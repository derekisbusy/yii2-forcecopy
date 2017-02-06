<?php

namespace derekisbusy\forcecopy;

class ForcecopyExtension implements BootstrapInterface
{
    public function bootstrap($app)
    {
        if (!isset($app->components['debug'])) {
            return;
        }
        
        $app->modules['debug']['panels'] = 'derekisbusy\forcecopy\ForceCopyPanel';
        
        $app->modules['debug']['controllerMap']['forcecopy'] = 'derekisbusy\forcecopy\controllers\ForcecopyController';
        
        $forcecopy = $app->cookies->getValue('debug-forcecopy', 'Off');
        
        $app->components['assetManager']['forceCopy'] = $forcecopy == 'On' ? true : false;
    }
}