<?php

namespace App\Http\Controllers\Auth;

use App\Common\Traits\ApiResponses;
use App\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

final readonly class LoginController
{
    use ApiResponses;

    public function __construct(private AuthServiceInterface $authService) {}

    public function __invoke(LoginRequest $request): JsonResponse
    {
        $result = $this->authService->login($request->validated());

        return $this->successResponse(
            data: [
                'user' => new UserResource($result['user']),
                'token' => $result['token'],
            ],
            message: __('custom.login_success')
        );
    }
}
