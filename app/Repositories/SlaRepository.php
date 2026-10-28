<?php

namespace App\Repositories;

use App\Contracts\Repositories\SlaRepositoryInterface;
use App\Models\SlaPolicy;

class SlaRepository implements SlaRepositoryInterface
{
    public function getPolicyByName(string $name): SlaPolicy
    {
        return SlaPolicy::where('name', $name)->first();
    }
}
