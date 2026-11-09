<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso - TallerDamian</title>
    <link rel="stylesheet" href="{{ asset('css/taller.css') }}">
</head>
<body>
    <main>
        <h1>Ingreso</h1>

        {{-- Mensaje que envia el controlador con with('error', ...) --}}
        @if(session('error'))
            <p class="aviso">{{ session('error') }}</p>
        @endif

        <form method="POST" action="/login">
            @csrf
            <label for="email">Correo</label>
            <input id="email" type="email" name="email" required>

            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">Entrar</button>
        </form>

        <p><a href="{{ route('registro') }}">Crear una cuenta</a></p>
    </main>
</body>
</html>
