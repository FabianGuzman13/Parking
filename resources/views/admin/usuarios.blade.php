<!-- filepath: resources/views/admin/usuarios.blade.php -->
@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h2>Usuarios registrados</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection