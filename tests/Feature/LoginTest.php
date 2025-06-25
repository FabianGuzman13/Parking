<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_puede_iniciar_sesion()
    {
        $user = User::create([
            'name' => 'Juan',
            'surname' => 'Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'juan@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(); // Redirige después de login
        $this->assertAuthenticatedAs($user);
    }
    
//Login con credenciales incorrectas
public function test_usuario_no_puede_iniciar_sesion_con_datos_invalidos()
{
    $user = User::create([
        'name' => 'Juan',
        'surname' => 'Pérez',
        'email' => 'juan@example.com',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->post('/login', [
        'email' => 'juan@example.com',
        'password' => 'wrongpassword',
    ]);

    $response->assertSessionHasErrors();
    $this->assertGuest();
}
//Login con usuario no registrado
public function test_usuario_no_registrado_no_puede_iniciar_sesion()
{
    $response = $this->post('/login', [
        'email' => 'noexiste@example.com',
        'password' => 'password123',
    ]);

    $response->assertSessionHasErrors();
    $this->assertGuest();
}

}