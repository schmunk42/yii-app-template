<?php
namespace App\Factory;

use App\Controller\AuthController;
use Psr\Container\ContainerInterface;
use Yiisoft\Router\FastRoute\FastRouteFactory;
use Yiisoft\Router\Method;
use Yiisoft\Router\Route;
use Yiisoft\Router\RouterFactory;
use Yiisoft\Yii\Web\Middleware\ActionCaller;
use App\Controller\SiteController;
use App\Controller\ContactController;

class AppRouterFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $routes = [
            Route::get('/',
                       new ActionCaller(SiteController::class, 'index', $container))
                ->name('site/index')
            ,
        ];

        return (new RouterFactory(new FastRouteFactory(), $routes))($container);
    }
}
