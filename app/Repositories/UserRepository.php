<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function getPaginatedUsers(int $perPage, ?string $search = null): LengthAwarePaginator
    {
        $query = User::query();

        if ($search) {
            $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%');
        }

        return $query->paginate($perPage);
    }
}
