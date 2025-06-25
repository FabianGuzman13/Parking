<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto | ParkEase</title>
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
        .contacto-container {
            max-width: 900px;
            width: 100%;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(233,30,99,0.08);
            padding: 40px 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }
        .contacto-info, .contacto-form {
            flex: 1 1 300px;
        }
        .contacto-title {
            color: #e91e63;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .contacto-info h5 {
            color: #ad1457;
            margin-bottom: 15px;
        }
        .contacto-info p, .contacto-info a {
            color: #444;
            margin-bottom: 10px;
        }
        .contacto-info a {
            text-decoration: none;
            color: #e91e63;
        }
        .contacto-info a:hover {
            text-decoration: underline;
        }
        .contacto-form label {
            font-weight: 500;
            color: #ad1457;
        }
        .contacto-form .form-control, .contacto-form textarea {
            margin-bottom: 15px;
        }
        .contacto-form button {
            background: #e91e63;
            color: #fff;
            border: none;
        }
        .contacto-form button:hover {
            background: #ad1457;
        }
        .contacto-mapa {
            margin-top: 30px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(233,30,99,0.07);
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
        <div class="contacto-container">
            <div class="contacto-info">
                <h2 class="contacto-title">Contáctanos</h2>
                <h5>¿Tienes dudas o sugerencias?</h5>
                <p>¡Estamos para ayudarte! Puedes comunicarte con nosotros a través de los siguientes medios:</p>
                <p><strong>Teléfono:</strong> <a href="tel:+51900338645">+51 900 338 645</a></p>
                <p><strong>Email:</strong> <a href="mailto:fabianguzmanchoque123@gmail.com">fabianguzmanchoque123@gmail.com</a></p>
                <p><strong>Dirección:</strong> Av. Principal 123, Lima, Perú</p>
                <div class="contacto-mapa">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.497406644663!2d-77.04279368465857!3d-12.0463741457467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c3b5e1f1b7%3A0x7f8b7b7b7b7b7b7b!2sLima%2C%20Per%C3%BA!5e0!3m2!1ses!2spe!4v1690000000000!5m2!1ses!2spe" 
                        width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="contacto-form">
                <h5>Envíanos un mensaje</h5>
                <form action="{{ route('contacto.enviar') }}" method="POST">
                    @csrf
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Tu correo" required>
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu mensaje" required></textarea>
                    <button type="submit" class="btn mt-2">Enviar</button>
                </form>
                @if(session('success'))
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                @endif
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