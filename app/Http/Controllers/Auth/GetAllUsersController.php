<?php

namespace App\Http\Controllers\Auth;

use App\Common\Traits\ApiResponses;
use App\Contracts\Services\AuthServiceInterface;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllUsersController
{
    use ApiResponses;

    public function __construct(private readonly AuthServiceInterface $authService) {}

    public function __invoke(Request $request): JsonResponse
    {
        $perPage = $request->query('perPage', 15);
        $search = $request->query('search');

        $context = $this->authService->getAllUsers($perPage, $search);

        /** @var array{
         *     data: array<int, array<string, mixed>>,
         *     links: array<string, mixed>,
         *     meta: array<string, mixed>
         * } $paginatedData
         */
        $paginatedData = UserResource::collection($context->users)->response()->getData(true);

        return $this->successResponse(
            data: [
                'user' => $paginatedData['data'],
                'pagination' => [
                    'meta' => $paginatedData['meta'],
                    'links' => $paginatedData['links'],
                ],
            ],
            message: 'Successfully retrieved users',
        );
    }
}
