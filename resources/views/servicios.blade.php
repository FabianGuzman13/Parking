<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicios | ParkEase</title>
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
            padding-top: 90px;
            box-sizing: border-box;
        }
        .servicios-container {
            max-width: 900px;
            width: 100%;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(233,30,99,0.08);
            padding: 40px 30px;
        }
        .servicios-title {
            color: #e91e63;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .servicios-list {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }
        .servicio-card {
            flex: 1 1 250px;
            background: #fce4ec;
            border-radius: 12px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(233,30,99,0.07);
            transition: transform 0.2s;
        }
        .servicio-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 6px 18px rgba(233,30,99,0.13);
        }
        .servicio-icon {
            font-size: 2.5rem;
            color: #e91e63;
            margin-bottom: 15px;
        }
        .servicio-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #ad1457;
        }
        .servicio-desc {
            font-size: 1rem;
            color: #444;
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
        <div class="servicios-container">
            <h2 class="servicios-title">Nuestros Servicios</h2>
            <p class="text-center mb-5">
                En ParkEase te ofrecemos soluciones modernas para tu comodidad y seguridad. Descubre nuestros servicios principales:
            </p>
            <div class="servicios-list">
                <div class="servicio-card">
                    <div class="servicio-icon">🚗</div>
                    <div class="servicio-title">Acceso Automatizado</div>
                    <div class="servicio-desc">
                        Ingresa y sal del estacionamiento sin tickets ni contacto, gracias a nuestro sistema de reconocimiento de placas.
                    </div>
                </div>
                <div class="servicio-card">
                    <div class="servicio-icon">💳</div>
                    <div class="servicio-title">Pagos Digitales</div>
                    <div class="servicio-desc">
                        Realiza tus pagos de manera rápida y segura con tarjetas, billeteras electrónicas o desde tu celular.
                    </div>
                </div>
                <div class="servicio-card">
                    <div class="servicio-icon">🔒</div>
                    <div class="servicio-title">Seguridad 24/7</div>
                    <div class="servicio-desc">
                        Cámaras de vigilancia, personal capacitado y monitoreo constante para tu tranquilidad y la de tu vehículo.
                    </div>
                </div>
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