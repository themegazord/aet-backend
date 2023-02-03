<?php

namespace App\Http\Controllers;

use App\Exceptions\Authentication\AuthenticationException;
use App\Http\Requests\Authentication\AuthenticationRequest;
use App\Services\Authentication\AuthenticationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends Controller
{
    public function __construct(private AuthenticationService $authenticationService)
    {
    }

    public function register(AuthenticationRequest $request): JsonResponse {
        try {
            $this->authenticationService->register($request->all());
            return response()->json(['message' => 'Usuário criado com sucesso'], Response::HTTP_CREATED);
        } catch (AuthenticationException $error) {
            return response()->json(['error' => $error->getMessage()], $error->getCode());
        }
    }
    public function login():JsonResponse {
        return response()->json([]);
    }
}
