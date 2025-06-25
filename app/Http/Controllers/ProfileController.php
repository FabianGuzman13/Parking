<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserva;

class ProfileController extends Controller
{
    public function show()
{
    $user = auth()->user();
    // Asegúrate de que la relación 'reservas' exista en tu modelo User
    $reservas = $user->reservas()->latest()->get();
    return view('profile.show', compact('user', 'reservas'));
}

public function edit()
{
    $user = auth()->user();
    return view('profile.edit', compact('user'));
}

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;

        if ($request->hasFile('profile_photo')) {
            $filename = time().'_'.$request->profile_photo->getClientOriginalName();
            $request->profile_photo->move(public_path('profile_photos'), $filename);
            $user->profile_photo = 'profile_photos/' . $filename;
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}