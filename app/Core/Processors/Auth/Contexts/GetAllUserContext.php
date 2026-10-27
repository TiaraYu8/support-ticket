<?php

namespace App\Core\Processors\Auth\Contexts;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class GetAllUserContext
{
    /** @var LengthAwarePaginator<int, User>|null */
    public ?LengthAwarePaginator $users = null;

    public function __construct(
        public int $perPage = 20,
        public ?string $search = null,
    ) {}
}
