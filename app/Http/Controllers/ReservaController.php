<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Sede;

class ReservaController extends Controller
{
    public function create(Request $request)
    {
        $sede_id = $request->input('sede_id');
        $ocupados = DB::table('reservas')
            ->where('sede_id', $sede_id)
            ->whereNull('hora_salida') // solo los lugares actualmente ocupados
            ->pluck('posicion')
            ->toArray();

        return view('reservas.create', compact('ocupados', 'sede_id'));
    }

public function store(Request $request)
{
    $request->validate([
        'posicion' => 'required|string|max:255',
        'placa' => 'required|string|max:20',
        'tipo_vehiculo' => 'required|string|max:20',
        'sede_id' => 'required|exists:sedes,id',
    ]);

    // Validar que la posición esté libre SOLO en la sede seleccionada
    $existe = Reserva::where('sede_id', $request->sede_id)
        ->where('posicion', $request->posicion)
        ->whereNull('hora_salida')
        ->exists();

    if ($existe) {
        return back()->withErrors(['posicion' => 'El lugar ya está ocupado.'])->withInput();
    }

    // Guardar la reserva
$reserva = Reserva::create([
    'user_id' => auth()->id(), // <-- agrega esta línea
    'sede_id' => $request->sede_id,
    'posicion' => $request->posicion,
    'placa' => $request->placa,
    'tipo_vehiculo' => $request->tipo_vehiculo,
    'fecha' => now()->toDateString(),
    'hora_entrada' => now()->format('H:i'),
]);

    // Redirige a la vista de la sede para que se recargue el arreglo de ocupados
    return redirect()->route('reservas.reservaPorSede', $request->sede_id)
        ->with('success', '¡Reserva registrada exitosamente!')
        ->with('reserva', $reserva);
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

        return view('reservas.ticket', compact('reserva', 'ticket'));
    }

        public function reservaPorSede($sedeId)
    {
        $sede = Sede::findOrFail($sedeId);
        $ocupados = Reserva::where('sede_id', $sede->id)
            ->whereNull('hora_salida')
            ->pluck('posicion')
            ->toArray();

        return view('reservas.reserva_por_sede', compact('sede', 'ocupados'));
    }
}