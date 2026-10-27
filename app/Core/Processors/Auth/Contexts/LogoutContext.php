<?php

namespace App\Core\Processors\Auth\Contexts;

use App\Models\User;

class LogoutContext
{
    public function __construct(public User $user) {}

}
