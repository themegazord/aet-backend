<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function findByEmail(string $email): bool;
    public function create(array $payload): void;
}
