<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function usuarios() {
        $usuarios = User::all();
        return view('admin.usuarios', compact('usuarios'));
    }

    public function tarifas() {
        // lógica para mostrar tarifas
        return view('admin.tarifas');
    }

    public function sedes() {
        // lógica para mostrar sedes
        return view('admin.sedes');
    }
}