@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Card de perfil -->
            <div class="card shadow mb-4 border-0">
                <div class="card-header bg-primary text-white fw-bold d-flex align-items-center" style="font-size: 1.2rem;">
                    <img src="{{ $user->profile_photo ? asset($user->profile_photo) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                         width="36" height="36"
                         class="me-2 rounded-circle border border-2 border-white object-fit-cover"
                         style="object-fit: cover;"
                         alt="Perfil">
                    Perfil de {{ $user->name }}
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center mb-3 mb-md-0">
                            <img src="{{ $user->profile_photo ? asset($user->profile_photo) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                                 width="70" height="70"
                                 class="rounded-circle border border-3 border-primary object-fit-cover"
                                 style="object-fit: cover;"
                                 alt="Avatar">
                        </div>
                        <div class="col-md-9">
                            <p class="mb-1"><b>Nombre:</b> {{ $user->name }}</p>
                            <p class="mb-1"><b>Email:</b> {{ $user->email }}</p>
                            <p class="mb-0"><b>Registrado desde:</b> {{ $user->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card de reservas -->
            <div class="card shadow border-0">
                <div class="card-header bg-secondary text-white fw-bold d-flex align-items-center" style="font-size: 1.1rem;">
                    <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" width="28" class="me-2" alt="Reservas">
                    Reservas realizadas
                </div>
                <div class="card-body">
                    @if($reservas && $reservas->count())
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Lugar</th>
                                        <th>Placa</th>
                                        <th>Tipo</th>
                                        <th>Fecha</th>
                                        <th>Entrada</th>
                                        <th>Salida</th>
                                        <th>Ticket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reservas as $reserva)
                                    <tr>
                                        <td>{{ $reserva->posicion }}</td>
                                        <td>{{ $reserva->placa }}</td>
                                        <td>{{ $reserva->tipo_vehiculo }}</td>
                                        <td>{{ $reserva->fecha }}</td>
                                        <td>{{ $reserva->hora_entrada }}</td>
                                        <td>
                                            @if($reserva->hora_salida)
                                                <span class="badge bg-success">{{ $reserva->hora_salida }}</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Pendiente</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('reservas.ticket', $reserva->id) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                Ver ticket
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info mb-0">
                            <i class="bi bi-info-circle"></i> No tienes reservas registradas.
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection