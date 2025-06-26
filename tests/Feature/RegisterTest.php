<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
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

        // Debug: muestra el usuario creado
        $user = User::where('email', 'juan@example.com')->first();
        dump($user ? $user->toArray() : 'No user found');

        $this->assertDatabaseHas('users', [
            'email' => 'juan@example.com',
            'name' => 'Juan',
            'surname' => 'Pérez',
        ]);
    }
}