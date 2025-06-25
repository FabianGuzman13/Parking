<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tarifas | ParkEase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #fafafa;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
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
            top: 0;
            left: 0;
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
        .main-content {
            flex: 1 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding-top: 90px; /* espacio para el header fijo */
            box-sizing: border-box;
        }
        .tarifas-container {
            max-width: 600px;
            width: 100%;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(233,30,99,0.08);
            padding: 40px 30px;
        }
        .tarifas-title {
            color: #e91e63;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .table thead th {
            background: #e91e63;
            color: #fff;
            border: none;
        }
        .table tbody tr td {
            vertical-align: middle;
        }
        .icono-tarifa {
            color: #e91e63;
            font-size: 1.3rem;
            margin-right: 8px;
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
    <div class="main-content">
        <div class="tarifas-container">
            <h2 class="tarifas-title">Tarifas por Hora</h2>
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">Duración</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="icono-tarifa">🕐</span>1 hora</td>
                        <td>S/ 3.00</td>
                    </tr>
                    <tr>
                        <td><span class="icono-tarifa">🕑</span>2 horas</td>
                        <td>S/ 5.50</td>
                    </tr>
                    <tr>
                        <td><span class="icono-tarifa">🕒</span>3 horas</td>
                        <td>S/ 7.50</td>
                    </tr>
                    <tr>
                        <td><span class="icono-tarifa">🕓</span>4 horas o más</td>
                        <td>S/ 9.00</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center mt-4">
                <small class="text-muted">* Los precios incluyen IGV. <br> Tarifas sujetas a cambios sin previo aviso.</small>
            </div>
        </div>
    </div>
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