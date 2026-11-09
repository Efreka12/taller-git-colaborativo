<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar vehiculo - TallerDamian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="h3 mb-2">Registrar vehiculo</h1>
                        <p class="text-secondary">La moto vale 3000 por hora. El carro vale 6000 por hora. La hora de entrada se guarda al enviar el formulario.</p>

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
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

                        <form method="POST" action="{{ route('parqueadero') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="placa">Placa</label>
                                <input class="form-control" id="placa" type="text" name="placa" value="{{ old('placa') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tipo">Tipo</label>
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <option value="">Selecciona</option>
                                    <option value="moto" @if(old('tipo') === 'moto') selected @endif>Moto</option>
                                    <option value="carro" @if(old('tipo') === 'carro') selected @endif>Carro</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <a class="btn btn-link" href="{{ route('parqueadero') }}">Volver a la tabla</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
