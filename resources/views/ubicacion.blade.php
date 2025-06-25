<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubicación</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: #ffffff;
            color: #333;
        }
        header {
            background: #ffffff; /* Fondo blanco */
            color: #d400ff; /* Texto rosado */
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        header .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #e91e63; /* Color exacto del logo según la imagen */
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: #333; /* Texto negro */
            text-decoration: none;
            font-weight: 500;
        }
        .map-container {
            text-align: center;
            padding: 40px 20px;
        }
        .map-container h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #ff008c;
        }
        .map-container p {
            font-size: 1.1rem;
            margin-bottom: 20px;
        }
        .map-container iframe {
            width: 90%;
            height: 450px;
            border: 0;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        footer {
            background: #ffffff; /* Fondo blanco */
            color: #333; /* Texto negro */
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
            border-top: 1px solid #e9ecef;
        }
        footer a {
            color: #d400ff; /* Enlaces rosados */
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">ParkEase</div>
        <nav>
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="/servicios">Servicios</a></li>
                <li><a href="/tarifas">Tarifas</a></li>
                <li><a href="/ubicacion">Ubicación</a></li>
                <li><a href="/contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <div class="map-container">
        <h1>Encuéntranos aquí</h1>
        <p>Estamos ubicados en el corazón de la ciudad para tu comodidad.</p>
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.497406644663!2d-77.04279368465857!3d-12.0463741457467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c3b5e1f1b7%3A0x7f8b7b7b7b7b7b7b!2sLima%2C%20Per%C3%BA!5e0!3m2!1ses!2spe!4v1690000000000!5m2!1ses!2spe" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>

    <footer>
        <p>&copy; 2025 ParkEase. Todos los derechos reservados.</p>
        <p><a href="#">Políticas de privacidad</a> | <a href="#">Términos y condiciones</a></p>
    </footer>
</body>
</html>