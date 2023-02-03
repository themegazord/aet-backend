<?php

namespace App\Repositories\Authentication;

use App\Models\User;
use App\Repositories\RepositoryInterface;

class EloquentAuthenticationRepository implements RepositoryInterface
{
    public function findByEmail(string $email): bool
    {
        return (bool)User::query()
            ->where('email', $email)
            ->first();
    }

    public function create(array $payload): void
    {
        User::query()->create($payload);
    }
}
