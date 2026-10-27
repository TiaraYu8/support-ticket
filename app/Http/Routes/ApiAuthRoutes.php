<?php

declare(strict_types=1);

namespace App\Http\Routes;

use App\Http\Controllers\Auth\GetAllUsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterClientController;
use App\Http\Controllers\Auth\RegisterStaffController;

final class ApiAuthRoutes extends AuthRoutes
{
    protected function getRegisterClientController(): string
    {
        return RegisterClientController::class;
    }

    protected function getRegisterStaffController(): string
    {
        return RegisterStaffController::class;
    }

    protected function getLoginController(): string
    {
        return LoginController::class;
    }

    protected function getLogoutController(): string
    {
        return LogoutController::class;
    }

    protected function getAllUsersController(): string
    {
        return GetAllUsersController::class;
    }

    protected function getGuestMiddleware(): string
    {
        return 'guest';
    }

    protected function getClientMiddleware(): array
    {
        return ['auth:sanctum', 'role:client'];
    }

    protected function getAdminMiddleware(): array
    {
        return ['auth:sanctum', 'role:client,support_agent'];
    }
}
