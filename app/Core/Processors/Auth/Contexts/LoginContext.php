<?php

namespace App\Core\Processors\Auth\Contexts;

use App\Models\User;

class LoginContext
{
    public ?User $user = null;

    public ?string $token = null;

    /**
     * @param  array<string, mixed>  $payload
     */
    public function __construct(public array $payload) {}
}
