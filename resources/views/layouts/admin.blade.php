<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Aquí puedes agregar estilos exclusivos para admin -->
</head>
<body>
    <nav>
        <!-- Menú de navegación exclusivo para admin -->
        <a href="{{ route('admin.pagos') }}">Pagos</a>
        <!-- Otros enlaces de admin -->
    </nav>
    <main class="container mt-4">
        @yield('content')
    </main>
</body>
</html>