<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ParkEase</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body, footer, .navbar, .navbar-brand, .nav-link, .logo {
        font-family: 'Segoe UI', 'Nunito', sans-serif !important;
    }
    .logo {
        font-size: 1.5rem;
        color: #e91e63;
        font-weight: bold;
        letter-spacing: 1px;
        margin-right: 24px;
        display: inline-block;
        vertical-align: middle;
    }
    .navbar-brand {
        display: none; /* Ocultamos el texto/link de Laravel */
    }
    .navbar {
        padding-top: 15px;
        padding-bottom: 15px;
    }
    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 15px 0 10px 0; /* igual que en inicio: menos padding */
        font-size: 0.95rem;
        margin-top: 40px;
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
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <div class="container d-flex align-items-center">
                <div class="logo">ParkEase</div>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ Auth::user()->profile_photo ? asset(Auth::user()->profile_photo) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                                     width="32" height="32"
                                     class="rounded-circle border border-2 border-primary me-2 object-fit-cover"
                                     style="object-fit: cover;"
                                     alt="Perfil">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    Ver perfil
                                </a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Configuraciones
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Bootstrap JS (para dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- FOOTER INICIO -->
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
    <!-- FOOTER FIN -->
</body>
</html>