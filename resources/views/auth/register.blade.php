<!doctype html>
<html lang="en">
<head>
    <title>Registrarse</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}">
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="{{ asset('assets/coche_azul.png') }}" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Registrarse</h4>
                </div>

                {{-- Mostrar errores de validación --}}
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                  @csrf
                  <p>Ingrese sus datos</p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="nombres">Nombres</label>
                    <input type="text" name="name" id="nombres" class="form-control" placeholder="Ingresar nombres" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input type="text" name="surname" id="apellidos" class="form-control" placeholder="Ingresar apellidos" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Dirección de correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Ingresar correo" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Registrarse</button>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Nos encargamos de tu vehiculo</h4>
                <p class="small mb-0">
                  Optimiza la gestión vehicular con nuestra plataforma de acceso automatizado.
                  Mediante reconocimiento de placas, pagos digitales y control en tiempo real, eliminamos la necesidad de tickets impresos y reducimos tiempos de entrada y salida.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>