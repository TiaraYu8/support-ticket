<?php

namespace App\Services;

use App\Contracts\Services\AuthServiceInterface;
use App\Core\Processors\Auth\AttemptLoginProcessor;
use App\Core\Processors\Auth\Contexts\LoginContext;
use App\Core\Processors\Auth\Contexts\RegisterContext;
use App\Core\Processors\Auth\CreateOrganizationProcessor;
use App\Core\Processors\Auth\CreateUserProcessor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Pipeline;

class AuthService implements AuthServiceInterface
{
    /**
     * @throws \Throwable
     */
    public function registerClient(array $payload): User
    {
        /** @var User $createdUser */
        $createdUser = DB::transaction(function () use ($payload) {
            $context = new RegisterContext(payload: $payload);

            /** @var RegisterContext $result */
            $result = Pipeline::send($context)
                ->through([
                    CreateOrganizationProcessor::class,
                    CreateUserProcessor::class,
                ])
                ->thenReturn();

            /** @var User $user */
            $user = $result->user;

            return clone $user;
        });

        return $createdUser;
    }

    /**
     * @throws \Throwable
     */
    public function registerStaff(array $payload): User
    {
        /** @var User $createdUser */
        $createdUser = DB::transaction(function () use ($payload) {
            $context = new RegisterContext(payload: $payload);

            /** @var RegisterContext $result */
            $result = Pipeline::send($context)
                ->through([
                    CreateUserProcessor::class,
                ])
                ->thenReturn();

            /** @var User $user */
            $user = $result->user;

            return clone $user;
        });

        return $createdUser;
    }

    /**
     * @param  array<string, mixed>  $payload
     * @return array{user: User, token: string}
     */
    public function login(array $payload): array
    {
        $context = new LoginContext(payload: $payload);

        /** @var LoginContext $result */
        $result = Pipeline::send($context)
            ->through([
                AttemptLoginProcessor::class,
            ])
            ->thenReturn();

        /** @var User $user */
        $user = $result->user;

        /** @var string $token */
        $token = $result->token;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
