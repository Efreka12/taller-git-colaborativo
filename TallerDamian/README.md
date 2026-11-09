# TallerDamian

Taller de Laravel con ingreso, registro, listado de usuarios y edicion segun el perfil.

## Como abrirlo

1. Abre la carpeta `TallerDamian` en Visual Studio Code.
2. En la terminal, dentro de esa carpeta:

```bash
composer install
copy .env.example .env
php artisan key:generate
```

En Linux o macOS, el segundo comando es `cp .env.example .env`.

3. Crea una base de datos MySQL llamada `taller_damian`.
   El usuario del archivo `.env` es `root` y la contraseña esta vacia, como en XAMPP.
4. Crea las tablas y dos cuentas de prueba:

```bash
php artisan migrate --seed
php artisan serve
```

5. Entra en `http://127.0.0.1:8000`.

Cuentas de prueba, las dos con contraseña `123456`:

- `admin.damian@gmail.com` entra como admin
- `damian.cliente@gmail.com` entra como cliente

Un correo nuevo que contenga la palabra `admin` tambien queda como admin. El resto queda como cliente.
