{{-- filepath: resources/views/reservas/reserva_por_sede.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <h2 class="fw-bold" style="color: #007bff;">¡Reserva tu espacio de parking!</h2>
            </div>

            <form action="{{ route('reservas.store') }}" method="POST">
                @csrf
                <!-- Campo oculto sede_id -->
                <input type="hidden" name="sede_id" value="{{ $sede->id }}">

                {{-- Sede seleccionada --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold" style="color: #6f42c1;">
                        <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" alt="Posición" width="22" class="me-1">
                        Sede
                    </label>
                    <input type="text" class="form-control" value="{{ $sede->nombre }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" style="color: #6f42c1;">
                        <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" alt="Posición" width="22" class="me-1">
                        Selecciona tu lugar
                    </label>
                    <div class="asientos" id="asientos"></div>
                    <input type="hidden" name="posicion" id="posicion" required>
                    <div class="form-text text-danger" id="asiento-error" style="display:none;">Debes seleccionar un lugar.</div>
                    <p>Lugar seleccionado: <span id="seleccionados"></span></p>
                </div>

                <div class="mb-3">
                    <label for="placa" class="form-label fw-semibold" style="color: #007bff;">
                        <img src="https://cdn-icons-png.flaticon.com/512/743/743131.png" alt="Placa" width="22" class="me-1">
                        Placa del vehículo
                    </label>
                    <input type="text" name="placa" id="placa" class="form-control border-primary shadow-sm" maxlength="20" required placeholder="ABC123 o 1234XYZ">
                </div>

                <div class="mb-3">
                    <label for="tipo_vehiculo" class="form-label fw-semibold" style="color: #6f42c1;">
                        <img src="https://cdn-icons-png.flaticon.com/512/744/744465.png" alt="Tipo" width="22" class="me-1">
                        Tipo de vehículo
                    </label>
                    <select name="tipo_vehiculo" id="tipo_vehiculo" class="form-select border-primary shadow-sm" required>
                        <option value="" disabled selected style="color: #aaa; opacity:0.7;">Automóvil</option>
                        <option value="Automóvil">Automóvil</option>
                        <option value="Motocicleta">Motocicleta</option>
                        <option value="Camioneta">Camioneta</option>
                        <option value="SUV">SUV</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold shadow" style="font-size: 1.2rem;">
                    <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="Guardar" width="24" class="me-2">
                    Guardar Reserva
                </button>
            </form>

            {{-- Mensaje de éxito y botón Generar ticket ABAJO del formulario --}}
            @if(session('success') && session('reserva'))
                <div class="alert alert-success mt-4">
                    <h5>Reserva guardada:</h5>
                    <ul class="mb-0">
                        <li><b>Lugar:</b> {{ session('reserva')->posicion }}</li>
                        <li><b>Placa:</b> {{ session('reserva')->placa }}</li>
                        <li><b>Tipo de vehículo:</b> {{ session('reserva')->tipo_vehiculo }}</li>
                        <li><b>Fecha:</b> {{ session('reserva')->fecha }}</li>
                        <li><b>Hora de entrada:</b> {{ session('reserva')->hora_entrada }}</li>
                    </ul>
                    <a href="{{ route('reservas.ticket', session('reserva')->id) }}" class="btn btn-primary mt-3">
                        Generar ticket
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Animate.css CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    .asientos {
        display: grid;
        grid-template-columns: repeat(8, 60px);
        gap: 14px;
        margin: 20px auto 30px auto;
        width: max-content;
    }
    .asiento {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #e3f0ff 60%, #b3c6e7 100%);
        border: 2px solid #007bff;
        border-radius: 12px;
        cursor: pointer;
        font-weight: bold;
        font-size: 14px;
        color: #007bff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px #007bff22;
        transition: 
            background 0.2s, 
            border 0.2s, 
            transform 0.2s,
            box-shadow 0.2s,
            filter 0.2s;
        position: relative;
    }
    .asiento:not(.ocupado):hover {
        background: linear-gradient(135deg, #e3f0ff 40%, #90caf9 100%);
        border-color: #1565c0;
        transform: scale(1.13);
        box-shadow: 0 0 16px 4px #2196f366, 0 2px 8px #007bff22;
        filter: brightness(1.15);
        z-index: 2;
    }
    .asiento img {
        width: 28px;
        margin-bottom: 2px;
        filter: drop-shadow(0 2px 4px #007bff33);
    }
    .asiento.seleccionado {
        background: linear-gradient(135deg, #4caf50 60%, #81c784 100%);
        color: #fff;
        border: 2.5px solid #388e3c;
        transform: scale(1.08);
    }
    .asiento.seleccionado img {
        filter: drop-shadow(0 2px 8px #388e3c88);
    }
    .asiento.ocupado {
        background: linear-gradient(135deg, #e53935 60%, #ffb3b3 100%);
        color: #fff;
        border: 2.5px solid #b71c1c;
        cursor: not-allowed;
        opacity: 0.7;
    }
    .asiento.ocupado img {
        filter: grayscale(1) brightness(0.7);
    }
</style>
<script>
    const filas = 5;
    const columnas = 8;
    const ocupados = @json($ocupados ?? []);
    const asientosDiv = document.getElementById('asientos');
    const seleccionadosSpan = document.getElementById('seleccionados');
    const posicionInput = document.getElementById('posicion');
    const asientoError = document.getElementById('asiento-error');
    let seleccionado = null;

    function formatoAsiento(n) {
        return 'A' + n.toString().padStart(2, '0');
    }

    for (let i = 0; i < filas * columnas; i++) {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.classList.add('asiento', 'animate__animated', 'animate__fadeInUp');
        btn.style.setProperty('--animate-duration', '0.6s');
        btn.innerHTML = `<img src="https://cdn-icons-png.flaticon.com/512/744/744465.png" alt="Auto"><span>${formatoAsiento(i+1)}</span>`;
        if (ocupados.includes(formatoAsiento(i+1))) {
            btn.classList.add('ocupado');
            btn.disabled = true;
        }
        btn.addEventListener('click', function() {
            document.querySelectorAll('.asiento.seleccionado').forEach(b => {
                b.classList.remove('seleccionado', 'animate__pulse');
            });
            btn.classList.add('seleccionado', 'animate__animated', 'animate__pulse');
            seleccionado = formatoAsiento(i+1);
            seleccionadosSpan.textContent = seleccionado;
            posicionInput.value = seleccionado;
            asientoError.style.display = 'none';
        });
        asientosDiv.appendChild(btn);
    }

    document.querySelector('form').addEventListener('submit', function(e) {
        if (!posicionInput.value) {
            asientoError.style.display = 'block';
            e.preventDefault();
        }
    });
</script>
@endsection