<!-- filepath: resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración | ParkEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Panel de Administración</h1>
        <p>Bienvenido, administrador. Aquí puedes modificar todo lo que desees.</p>
        <div class="list-group mt-4 mb-4">
            <a href="{{ route('admin.usuarios') }}" class="list-group-item list-group-item-action">Gestionar Usuarios</a>
            <a href="{{ route('admin.tarifas') }}" class="list-group-item list-group-item-action">Gestionar Tarifas</a>
            <a href="{{ route('admin.sedes') }}" class="list-group-item list-group-item-action">Gestionar Sedes</a>
            <!-- Agrega más enlaces según lo que quieras administrar -->
        </div>
        @yield('content')
    </div>
</body>
</html>