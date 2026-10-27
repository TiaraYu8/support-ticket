<?php

namespace App\Contracts\Services;

use App\Core\Processors\Auth\Contexts\GetAllUserContext;
use App\Models\User;

interface AuthServiceInterface
{
    /**
     * @param  array<string, mixed>  $payload
     */
    public function registerClient(array $payload): User;

    /**
     * @param  array<string, mixed>  $payload
     */
    public function registerStaff(array $payload): User;

    /**
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    public function login(array $payload): array;

    public function logout(User $user): void;

    public function getAllUsers(int $perPage = 15, ?string $search = null): GetAllUserContext;
}
