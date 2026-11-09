# Parqueadero

Proyecto aparte del taller de usuarios. Tiene ingreso, registro de cuenta, tabla de vehiculos, hora de salida y tarifa. No usa roles.

## Como abrirlo

1. Abre la carpeta `Parqueadero` en Visual Studio Code.
2. En la terminal, dentro de esa carpeta:

```bash
composer install
copy .env.example .env
php artisan key:generate
```

En Linux o macOS, el segundo comando es `cp .env.example .env`.

3. Crea en phpMyAdmin una base llamada `parqueadero`.
   El usuario del `.env` es `root` y la contraseña va vacia.
4. Crea las tablas y la cuenta de prueba:

```bash
php artisan migrate --seed
php artisan serve
```

5. Abre `http://127.0.0.1:8000`.

Cuenta de prueba: `damian@gmail.com` con contraseña `123456`.

La moto cobra 3000 por hora y el carro 6000. La hora que ya empezo se cobra completa.
