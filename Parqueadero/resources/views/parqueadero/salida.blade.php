<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hora de salida - TallerDamian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="h3 mb-2">Hora de salida</h1>
                        <p class="text-secondary">{{ $registro->placa }} · {{ $registro->tipo }} · entro {{ $registro->hora_entrada }}</p>

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

                        <form method="POST" action="{{ route('parqueadero.salida', $registro->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="hora_salida">Hora de salida</label>
                                <input class="form-control" id="hora_salida" type="datetime-local" name="hora_salida" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Calcular tarifa</button>
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
