{{-- filepath: resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkEase - Inicio</title>
    <style>
        /* ... Tus estilos existentes ... */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
            color: #333;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            z-index: 10;
        }
        .logo {
            font-size: 1.5rem;
            color: #e91e63;
            font-weight: bold;
        }
        .nav-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        .hero {
            position: relative;
            width: 100%;
            height: 500px;
            background: url('/images/fondo_inicio.png') center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 80px;
        }
        .hero-content {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 30px 50px;
            border-radius: 12px;
            text-align: center;
        }
        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 25px;
        }
        .hero-content select {
            padding: 12px;
            border-radius: 8px;
            border: none;
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .btn {
            margin-top: 15px;
            padding: 12px 24px;
            background-color: #e91e63;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
        }
        .btn:hover {
            background-color: #d81b60;
        }
        .section-below {
            text-align: center;
            padding: 60px 20px;
            font-size: 1.3rem;
            background-color: #fafafa;
            font-weight: bold;
            color: #880e4f;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
        }
        footer a {
            color: #ff80ab;
            text-decoration: none;
            margin: 0 10px;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">ParkEase</div>
    <nav class="nav-links">
        <a href="{{ url('/') }}">Inicio</a>
        <a href="{{ url('/servicios') }}">Servicios</a>
        <a href="{{ url('/tarifas') }}">Tarifas</a>
        <a href="{{ url('/ubicacion') }}">Ubicación</a>
        <a href="{{ url('/contacto') }}">Contacto</a>
        
    </nav>
</header>

    <section class="hero">
        <div class="hero-content">
            <h1>Conoce tu ParkEase</h1>
            <p>Tu espacio de estacionamiento urbano</p>
            <form id="form-sede" method="GET">
                <select name="sede_id" id="sede_id" class="form-select" required>
                    <option value="" disabled selected>Selecciona una Sede</option>
                    @foreach($sedes as $sede)
                        <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                    @endforeach
                </select><br>
                <button type="submit" class="btn">Ver Disponibilidad</button>
            </form>
            <script>
                document.getElementById('form-sede').addEventListener('submit', function(e) {
                    e.preventDefault();
                    let sedeId = document.getElementById('sede_id').value;
                    if(sedeId) {
                        window.location.href = '/reservas/sede/' + sedeId;
                    }
                });
            </script>
        </div>
    </section>

    <section class="section-below">
        Todo lo que necesitas en tu espacio urbano
    </section>

    <footer>
        <p>&copy; 2025 ParkEase. Todos los derechos reservados.</p>
        <p>
            <a href="#politica">Política de privacidad</a> |
            <a href="#terminos">Términos y condiciones</a> |
            <a href="#contacto">Contáctanos</a> |
            <a href="/">Inicio</a> |
            <a href="/ubicacion">Ubícanos</a>
        </p>
    </footer>
</body>
</html>