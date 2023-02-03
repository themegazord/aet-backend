<?php

namespace App\Services\Authentication;

use App\Exceptions\Authentication\AuthenticationException;
use App\Repositories\RepositoryInterface;

class AuthenticationService
{

    public function __construct(private RepositoryInterface $repository) {}


    /**
     * @throws AuthenticationException
     */
    public function register(array $payload): void {
        $this->verifyUserExistsByEmail($payload['email']);
        $this->repository->create($payload);
    }

    /**
     * @throws AuthenticationException
     */
    private function verifyUserExistsByEmail(string $email): void
    {
        if ($this->repository->findByEmail($email)) {
            throw AuthenticationException::ExistingUser();
        }
    }
}
