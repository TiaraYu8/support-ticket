<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Common\Traits\ApiResponses;
use App\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\Auth\RegisterClientRequest;
use App\Http\Resources\UserClientResource;
use Illuminate\Http\JsonResponse;

final readonly class RegisterClientController
{
    use ApiResponses;

    public function __construct(
        private AuthServiceInterface $authService,
    ) {}

    public function __invoke(RegisterClientRequest $request): JsonResponse
    {
        $user = $this->authService->registerClient($request->validated());
        $user->load('organization');

        return $this->successResponse(
            data: [
                'user' => new UserClientResource($user),
            ],
            message: __('custom.registration_successful'),
            code: 201
        );
    }
}
