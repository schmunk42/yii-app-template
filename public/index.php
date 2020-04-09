<?php

use Yiisoft\Composer\Config\Builder;
use Yiisoft\Di\Container;
use Yiisoft\Yii\Web\ServerRequestFactory;

(function () {
    require_once __DIR__ . '/../vendor/autoload.php';

    // Don't do it in production, assembling takes it's time
    if (getenv('YII_ENV') === 'dev') {
        hiqdev\composer\config\Builder::rebuild();
    }

    $container = new Container(require Builder::path('web'));

    $request = $container->get(ServerRequestFactory::class)->createFromGlobals();
    $container->get('app')->handle($request);
})();
