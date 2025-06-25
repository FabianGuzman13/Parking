{{-- filepath: resources/views/reservas/ticket.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg mx-auto" style="max-width: 400px; border-radius: 18px;">
        <div class="card-header bg-primary text-white text-center" style="border-top-left-radius: 18px; border-top-right-radius: 18px;">
            <h4 class="mb-0 fw-bold">🎫 Ticket Virtual</h4>
        </div>
        <div class="card-body text-center">
            <div class="mb-3">
                <span style="font-size: 1.1rem; color: #888;">Número de Ticket</span>
                <div style="font-size:2.2rem; font-weight:bold; letter-spacing:2px; color:#007bff; margin-top: 5px;">{{ $ticket }}</div>
            </div>
            <hr>
            <div class="mb-2">
                <span class="fw-semibold" style="color:#007bff;">Lugar:</span>
                <span>{{ $reserva->posicion }}</span>
            </div>
            <div class="mb-2">
                <span class="fw-semibold" style="color:#007bff;">Placa:</span>
                <span>{{ $reserva->placa }}</span>
            </div>
            <div class="mb-2">
                <span class="fw-semibold" style="color:#007bff;">Tipo de vehículo:</span>
                <span>{{ $reserva->tipo_vehiculo }}</span>
            </div>
            <div class="mb-2">
                <span class="fw-semibold" style="color:#007bff;">Fecha:</span>
                <span>{{ $reserva->fecha }}</span>
            </div>
            <div class="mb-2">
                <span class="fw-semibold" style="color:#007bff;">Hora de entrada:</span>
                <span>{{ $reserva->hora_entrada }}</span>
            </div>
            @if(class_exists('\SimpleSoftwareIO\QrCode\Facades\QrCode'))
            <div class="my-4">
                {!! QrCode::size(180)->generate($ticket) !!}

                <p>
                    <strong>Tiempo estacionado:</strong>
                    @if(!$reserva->hora_salida)
                        <span id="contador-tiempo">00:00:00</span>
                    @else
                        {{
                            \Carbon\Carbon::parse($reserva->fecha . ' ' . $reserva->hora_entrada)
                                ->diff(\Carbon\Carbon::parse($reserva->fecha . ' ' . $reserva->hora_salida))
                                ->format('%H:%I:%S')
                        }}
                    @endif
                </p>
                @if($reserva->hora_salida)
                    <p><strong>Monto a pagar:</strong> S/ {{ number_format($reserva->calcularPagoAutomatico(), 2) }}</p>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
@if(!$reserva->hora_salida)
    <form action="{{ route('reservas.salida', $reserva->id) }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger w-100 fw-bold">
            Registrar Salida
        </button>
    </form>
@else
    <div class="alert alert-success mt-3">
        <b>Hora de salida registrada:</b> {{ $reserva->hora_salida }}
    </div>
@endif

@if(!$reserva->hora_salida)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let entradaFecha = "{{ $reserva->fecha }}";
        let entradaHora = "{{ $reserva->hora_entrada }}";
        if (entradaHora.length === 5) { // Si es HH:mm, agrega :00
            entradaHora += ":00";
        }
        // Separar fecha y hora en componentes numéricos
        let fechaPartes = entradaFecha.split('-');
        let horaPartes = entradaHora.split(':');
        let entradaDate = new Date(
            parseInt(fechaPartes[0]),           // Año
            parseInt(fechaPartes[1]) - 1,       // Mes (0-indexed)
            parseInt(fechaPartes[2]),           // Día
            parseInt(horaPartes[0]),            // Hora
            parseInt(horaPartes[1]),            // Minuto
            parseInt(horaPartes[2])             // Segundo
        );

        function actualizarContador() {
            let ahora = new Date();
            let diff = Math.max(0, ahora - entradaDate);
            let horas = Math.floor(diff / 1000 / 60 / 60);
            let minutos = Math.floor((diff / 1000 / 60) % 60);
            let segundos = Math.floor((diff / 1000) % 60);
            document.getElementById('contador-tiempo').textContent =
                String(horas).padStart(2, '0') + ':' +
                String(minutos).padStart(2, '0') + ':' +
                String(segundos).padStart(2, '0');
        }
        actualizarContador();
        setInterval(actualizarContador, 1000);
    });
</script>
@endif
@endsection