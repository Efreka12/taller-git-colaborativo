<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - TallerDamian</title>
    <link rel="stylesheet" href="{{ asset('css/taller.css') }}">
</head>
<body>
    <main>
        {{-- $saludo y $listado llegan desde HomeController --}}
        <h1>{{ $saludo }}</h1>

        @if(session('error'))
            <p class="aviso">{{ session('error') }}</p>
        @endif

        @if(session('success'))
            <p class="ok">{{ session('success') }}</p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Perfil</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listado as $persona)
                    <tr>
                        <td>{{ $persona->id }}</td>
                        <td>{{ $persona->name }}</td>
                        <td>{{ $persona->email }}</td>
                        <td>{{ $persona->role }}</td>
                        <td>
                            <a href="{{ route('usuarios.editar', $persona->id) }}">Editar</a>

                            {{-- El admin ve el boton, y no puede borrar su propia fila --}}
                            @if(Auth::user()->role === 'admin' && Auth::user()->id != $persona->id)
                                <form method="POST" action="{{ route('usuarios.eliminar', $persona->id) }}">
                                    @csrf
                                    <button type="submit">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><a href="/usuarios">Ver el listado en JSON</a></p>
    </main>
</body>
</html>
