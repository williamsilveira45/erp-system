<?php

declare(strict_types=1);

namespace App\Modules\Core\Interfaces;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getAll(?int $perPage = 100, ?int $page = 1): LengthAwarePaginator;

    public function findByEmail(string $email): ?User;

    public function findById(string $id): ?User;

    public function findOrFailById(string $id): ?User;
}
