<?php

namespace App\Core\Processors\Auth;

use App\Core\Processors\Auth\Contexts\RegisterContext;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Hash;

class CreateUserProcessor
{
    public function handle(RegisterContext $context, Closure $next): mixed
    {
        /** @var string $password */
        $password = $context->payload['password'];

        $context->user = User::create([
            'organization_id' => $context->organization?->id,
            'name' => $context->payload['name'],
            'email' => $context->payload['email'],
            'password' => Hash::make($password),
            'role' => $context->payload['role'],
        ]);

        return $next($context);
    }
}
