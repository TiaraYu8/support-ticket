<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Common\Traits\ApiResponses;
use App\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\Auth\RegisterStaffRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

final readonly class RegisterStaffController
{
    use ApiResponses;

    public function __construct(
        private AuthServiceInterface $authService,
    ) {}

    public function __invoke(RegisterStaffRequest $request): JsonResponse
    {
        $user = $this->authService->registerStaff($request->validated());

        return $this->successResponse(
            data: [
                'user' => new UserResource($user),
            ],
            message: __('custom.registration_successful'),
            code: 201
        );
    }
}
