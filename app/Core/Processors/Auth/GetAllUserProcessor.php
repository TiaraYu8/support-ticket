<?php

namespace App\Core\Processors\Auth;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Core\Processors\Auth\Contexts\GetAllUserContext;
use Closure;

readonly class GetAllUserProcessor
{
    public function __construct(private UserRepositoryInterface $userRepository) {}

    public function handle(GetAllUserContext $context, Closure $next): mixed
    {
        $context->users = $this->userRepository->getPaginatedUsers(
            $context->perPage,
            $context->search,
        );

        return $next($context);
    }
}
