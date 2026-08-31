<?php

namespace App\Core\Processors\Auth;

use App\Core\Processors\Auth\Contexts\RegisterContext;
use App\Models\Organization;
use Closure;

class CreateOrganizationProcessor
{
    public function handle(RegisterContext $context, Closure $next): mixed
    {
        return $next(
            $context->organization = Organization::create([
                'name' => $context->payload['organization_name'],
            ])
        );
    }
}
