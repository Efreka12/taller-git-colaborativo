<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cuentas de prueba. Se guardan igual que en RegistroController.
        User::create([
            'name' => 'Damian Admin',
            'email' => 'admin.damian@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Damian Cliente',
            'email' => 'damian.cliente@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'cliente',
        ]);
    }
}
