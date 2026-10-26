<?php

declare(strict_types=1);

namespace App\Http\Routes;

use App\Contracts\RouteMapper;
use Illuminate\Routing\Router;

abstract class AuthRoutes implements RouteMapper
{
    /**
     * @return class-string
     */
    abstract protected function getRegisterClientController(): string;

    /**
     * @return class-string
     */
    abstract protected function getRegisterStaffController(): string;

    /**
     * @return class-string
     */
    abstract protected function getLoginController(): string;

    abstract protected function getGuestMiddleware(): string;

    abstract protected function getAdminMiddleware(): string;

    /**
     * Map the routes.
     */
    public function map(Router $router): void
    {
        $router->group(['prefix' => 'auth'], function (Router $router) {

            $router->post('/client/register', $this->getRegisterClientController())
                ->middleware($this->getGuestMiddleware());

            $router->post('/staff/register', $this->getRegisterStaffController())
                ->middleware($this->getAdminMiddleware());

            $router->post('/login', $this->getLoginController())
                ->middleware($this->getGuestMiddleware());
        });
    }
}
