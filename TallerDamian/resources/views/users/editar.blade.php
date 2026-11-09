<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - TallerDamian</title>
    <link rel="stylesheet" href="{{ asset('css/taller.css') }}">
</head>
<body>
    <main>
        <h1>Editar usuario</h1>

        @if(session('success'))
            <p class="ok">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <ul class="aviso">
                @foreach($errors->all() as $mensaje)
                    <li>{{ $mensaje }}</li>
                @endforeach
            </ul>
        @endif

        {{-- $registro es el usuario que encontro UsersController --}}
        <form method="POST" action="{{ route('usuarios.actualizar', $registro->id) }}">
            @csrf
            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name', $registro->name) }}" required>

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email', $registro->email) }}" required>

            <label for="password">Contraseña nueva</label>
            <input id="password" type="password" name="password">
            <p>Si la dejas vacia, se conserva la contraseña actual.</p>

            <button type="submit">Guardar</button>
        </form>

        <p><a href="{{ route('home') }}">Volver al listado</a></p>
    </main>
</body>
</html>
