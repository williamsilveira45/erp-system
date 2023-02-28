<?php

declare(strict_types=1);

namespace App\Modules\Core\Repositories;

use App\Models\User;
use App\Modules\Core\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(?int $perPage = 100, ?int $page = 1): LengthAwarePaginator
    {
        return User::query()->paginate($perPage, ['*'], 'page', $page);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function findById(string $id): ?User
    {
        return User::find($id);
    }

    public function findOrFailById(string $id): ?User
    {
        return User::findOrFail($id);
    }
}
