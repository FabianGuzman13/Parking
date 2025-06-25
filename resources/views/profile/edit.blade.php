@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 520px;">
    <h2 class="mb-4 text-center">Configuración de Perfil</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="p-4 rounded shadow bg-white">
        @csrf

        <div class="mb-4 text-center">
            <label for="profile_photo" class="form-label d-block mb-2 fw-bold">Foto de perfil</label>
            <div class="mb-2">
                <img id="preview" src="{{ $user->profile_photo ? asset($user->profile_photo) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                     alt="Foto de perfil" width="90" height="90"
                     class="rounded-circle border border-3 border-primary object-fit-cover"
                     style="object-fit: cover;">
            </div>
            <input type="file" id="profile_photo" name="profile_photo" class="form-control" accept="image/*" onchange="previewPhoto(event)">
            <small class="text-muted">Formatos permitidos: JPG, PNG. Máx: 2MB.</small>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Correo electrónico</label>
            <input type="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>

<script>
function previewPhoto(event) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    };
    if(input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection