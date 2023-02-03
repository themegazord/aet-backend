<?php

namespace App\Exceptions\Authentication;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationException extends Exception
{
    public static function ExistingUser(): self {
        return new self('O email já está vinculado ao um usuário existente.', Response::HTTP_BAD_REQUEST);
    }
}
