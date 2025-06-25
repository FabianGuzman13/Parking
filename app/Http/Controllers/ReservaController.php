<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Sede;

class ReservaController extends Controller
{
    public function create()
    {
        // Obtén los lugares ocupados desde la base de datos
        $ocupados = DB::table('reservas')->pluck('posicion')->toArray();
        return view('reservas.create', compact('ocupados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'posicion' => 'required|string|max:255',
            'placa' => 'required|string|max:20',
            'tipo_vehiculo' => 'required|string|max:20',
            'sede_id' => 'required|exists:sedes,id',
        ]);

        // Asegúrate de que el modelo Reserva tenga 'sede_id' en $fillable
        $reserva = Reserva::create([
            'user_id' => Auth::id(),
            'sede_id' => $request->input('sede_id'),
            'posicion' => $request->input('posicion'),
            'placa' => $request->input('placa'),
            'tipo_vehiculo' => $request->input('tipo_vehiculo'),
            'hora_entrada' => now()->format('H:i'),
            'fecha' => now()->format('Y-m-d'),
            'hora_salida' => null,
        ]);

        return redirect()->route('reservas.create')->with('success', '¡Reserva registrada exitosamente!')->with('reserva', $reserva);
    }

    public function ticket($id)
    {
        $reserva = Reserva::where('user_id', auth()->id())->findOrFail($id);
        $ticket = 'TICKET-' . str_pad($reserva->id, 6, '0', STR_PAD_LEFT);
        return view('reservas.ticket', compact('reserva', 'ticket'));
    }

    public function registrarSalida($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->hora_salida = now()->format('H:i');
        $reserva->save();

        $ticket = 'TICKET-' . str_pad($reserva->id, 6, '0', STR_PAD_LEFT);

        // Redirige a la vista del ticket mostrando el monto actualizado
        return view('reservas.ticket', compact('reserva', 'ticket'));
    }

    public function reservaPorSede($sedeId)
    {
        $sede = Sede::findOrFail($sedeId);
        // Obtén los lugares ocupados en la sede
        $ocupados = Reserva::where('sede_id', $sede->id)
            ->pluck('posicion')
            ->toArray();

        return view('reservas.reserva_por_sede', compact('sede', 'ocupados'));
    }
}