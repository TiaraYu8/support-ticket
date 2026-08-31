<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\Services\AuthServiceInterface;
use App\Http\Routes\ApiAuthRoutes;
use App\Services\AuthService;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * @var array<class-string, class-string>
     */
    public array $singletons = [
        AuthServiceInterface::class => AuthService::class,
    ];

    public function boot(Router $router): void
    {
        $router->group([
            'prefix' => 'api',
            'middleware' => 'api',
        ], function (Router $router) {

            (new ApiAuthRoutes)->map($router);

        });
    }
}
