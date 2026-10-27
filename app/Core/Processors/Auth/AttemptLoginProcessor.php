<?php

namespace App\Core\Processors\Auth;

use App\Common\Exceptions\BusinessException;
use App\Core\Processors\Auth\Contexts\LoginContext;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Hash;

class AttemptLoginProcessor
{
    /**
     * @throws BusinessException
     */
    public function handle(LoginContext $context, Closure $next): mixed
    {
        /** @var string $email */
        $email = $context->payload['email'];

        /** @var string $password */
        $password = $context->payload['password'];

        $user = User::where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            throw new BusinessException(__('custom.invalid_credentials'), 401);
        }

        $context->user = $user;
        $context->token = $user->createToken('auth_token')->plainTextToken;

        return $next($context);
    }
}
