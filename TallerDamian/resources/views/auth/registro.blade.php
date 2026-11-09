<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - TallerDamian</title>
    <link rel="stylesheet" href="{{ asset('css/taller.css') }}">
</head>
<body>
    <main>
        <h1>Registro</h1>
        <p>Si el correo contiene la palabra admin, la cuenta queda como administrador.</p>

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

        <form method="POST" action="/registro">
            @csrf
            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">Registrar</button>
        </form>

        <p><a href="{{ route('login') }}">Volver al ingreso</a></p>
    </main>
</body>
</html>
