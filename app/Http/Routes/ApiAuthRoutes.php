<?php

declare(strict_types=1);

namespace App\Http\Routes;

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

    protected function getGuestMiddleware(): string
    {
        return 'guest';
    }

    protected function getAdminMiddleware(): string
    {
        return 'auth:sanctum,role.staff';
    }
}
