<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Reserva extends Model
{
    use HasFactory;

protected $fillable = [
    'user_id',
    'sede_id',
    'posicion',
    'placa',
    'tipo_vehiculo',
    'hora_entrada',
    'fecha',
    'hora_salida',
];

    /**
     * Relación: una reserva pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Calcula el pago automático según tipo de vehículo y horas.
     *
     * @return float
     */
    public function calcularPagoAutomatico(): float
    {
        // Verifica que ambas horas estén presentes
        if (!$this->hora_entrada || !$this->hora_salida) {
            return 0;
        }

        $entrada = Carbon::parse($this->hora_entrada);
        $salida = Carbon::parse($this->hora_salida);

        // Si la salida es antes que la entrada, retorna 0
        if ($salida->lessThanOrEqualTo($entrada)) {
            return 0;
        }

        // Calcula la diferencia de horas, redondeando hacia arriba si hay minutos extra
        $minutos = $entrada->diffInMinutes($salida);
        $horas = intdiv($minutos, 60);
        if ($minutos % 60 > 0) {
            $horas += 1;
        }

        // Tarifa según tipo de vehículo
        $tarifa = 0;
        if ($this->tipo_vehiculo === 'carro') {
            $tarifa = 4;
        } elseif ($this->tipo_vehiculo === 'moto') {
            $tarifa = 2;
        }

        return $tarifa * $horas;
    }
}