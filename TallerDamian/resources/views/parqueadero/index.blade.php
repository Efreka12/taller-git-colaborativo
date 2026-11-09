<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parqueadero - TallerDamian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">{{ $saludo }}</h1>
                    <a class="btn btn-primary" href="{{ route('parqueadero.crear') }}">Registrar vehiculo</a>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Tipo</th>
                                <th>Entrada</th>
                                <th>Salida</th>
                                <th>Tarifa total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listado as $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo->placa }}</td>
                                    <td>{{ $vehiculo->tipo }}</td>
                                    <td>{{ $vehiculo->hora_entrada }}</td>
                                    <td>{{ $vehiculo->hora_salida ? $vehiculo->hora_salida : 'En el parqueadero' }}</td>
                                    <td>
                                        @if($vehiculo->tarifa_total)
                                            {{ number_format($vehiculo->tarifa_total, 0, ',', '.') }}
                                        @else
                                            Pendiente
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('parqueadero.salida', $vehiculo->id) }}">Hora de salida</a>

                                        <form class="d-inline" method="POST" action="{{ route('parqueadero.eliminar', $vehiculo->id) }}">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
