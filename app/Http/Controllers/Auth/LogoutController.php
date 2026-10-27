<?php

namespace App\Http\Controllers\Auth;

use App\Common\Traits\ApiResponses;
use App\Contracts\Services\AuthServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final readonly class LogoutController
{
    use ApiResponses;

    public function __construct(private AuthServiceInterface $authService) {}

    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authService->logout($user);

        return $this->successResponse(
            message: 'Logout successful.',
        );
    }
}
