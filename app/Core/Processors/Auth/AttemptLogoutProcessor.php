<?php

namespace App\Core\Processors\Auth;

use App\Common\Exceptions\BusinessException;
use App\Core\Processors\Auth\Contexts\LogoutContext;
use Closure;

class AttemptLogoutProcessor
{
    /**
     * @throws BusinessException
     */
    public function handle(LogoutContext $context, Closure $next): mixed
    {
        $context->user->currentAccessToken()->delete();

        return $next($context);
    }
}
