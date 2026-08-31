<?php

namespace App\Core\Processors\Auth\Contexts;

use App\Models\Organization;
use App\Models\User;

class RegisterContext
{
    /**
     * @param  array<string, mixed>  $payload
     */
    public function __construct(
        public array $payload,
        public ?Organization $organization = null,
        public ?User $user = null,
    ) {}
}
