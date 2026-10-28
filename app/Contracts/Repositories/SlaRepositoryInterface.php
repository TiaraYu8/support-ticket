<?php

namespace App\Contracts\Repositories;

use App\Models\SlaPolicy;

interface SlaRepositoryInterface
{
    public function getPolicyByName(string $name): ?SlaPolicy;
}
