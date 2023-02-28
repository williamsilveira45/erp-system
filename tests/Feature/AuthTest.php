<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->initDatabase();
    }

    public function tearDown(): void
    {
        $this->resetDatabase();
        parent::tearDown();
    }

    public function test_login_user_authentication(): void
    {
        $response = $this->get('/sanctum/csrf-cookie');
        $response->assertStatus(204);

        $response = $this->postJson('/api/login', [
            'email' => env('DEFAULT_USER_EMAIL'),
            'password' => env('DEFAULT_USER_PASSWORD')
        ], [
            'Origin' => "https://".env('SANCTUM_STATEFUL_DOMAINS'),
            'X-XSRF-TOKEN' => $response->getCookie('XSRF-TOKEN')->getValue()
        ]);

        $response->assertStatus(201);

        throw_if(Auth::check() === false, new \Exception('User is not authenticated'));
    }
}
