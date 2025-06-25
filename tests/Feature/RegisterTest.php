<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_puede_registrarse()
    {
        $response = $this->post('/register', [
            'name' => 'Juan',
            'surname' => 'Pérez',
            'email' => 'juan@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(); // Redirige después de registrar
        $this->assertDatabaseHas('users', [
            'email' => 'juan@example.com',
            'name' => 'Juan',
            'surname' => 'Pérez',
        ]);
    }
}