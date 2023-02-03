<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use DatabaseMigrations;

    private array $payload = [
        'name' => 'Gustavo de Camargo Campos',
        'email' => 'contato.wanjalagus@outlook.com.br',
        'password' => 'password'
    ];
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testUserCanRegister(): void
    {
        $response = $this->post(route('auth.register'), $this->payload);
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson(['message' => 'Usuário criado com sucesso']);
    }

    // TODO: verificar se isso é realmente feito assim
    public function testUserCanRegisteringWithExistingEmail() {
        $this->post(route('auth.register'), $this->payload);
        $response = $this->post(route('auth.register'), $this->payload);
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
        $response->assertJson(['error' => 'O email já está vinculado ao um usuário existente.']);
    }
}
