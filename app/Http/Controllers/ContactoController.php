<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
            'mensaje' => 'required|string|max:1000',
        ]);

        // Cambia este correo por el tuyo:
        $destinatario = 'fabianguzmanchoque123@gmail.com';

        Mail::raw(
            "Nombre: {$request->nombre}\nCorreo: {$request->email}\nMensaje:\n{$request->mensaje}",
            function ($message) use ($destinatario) {
                $message->to($destinatario)
                        ->subject('Nuevo mensaje de contacto desde ParkEase');
            }
        );

        return back()->with('success', '¡Mensaje enviado correctamente!');
    }
}