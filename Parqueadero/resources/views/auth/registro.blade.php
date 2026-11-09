<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Parqueadero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="h3 mb-4">Registro</h1>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-warning" role="alert">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $mensaje)
                                        <li>{{ $mensaje }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="/registro">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">Nombre</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Correo</label>
                                <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Contraseña</label>
                                <input class="form-control" id="password" type="password" name="password" required>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Registrar</button>
                        </form>

                        <p class="mt-3 mb-0 text-center">
                            <a href="{{ route('login') }}">Volver al ingreso</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
