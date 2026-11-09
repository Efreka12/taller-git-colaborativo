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
        // Cuenta de prueba. Se guarda igual que en RegistroController.
        User::create([
            'name' => 'Damian',
            'email' => 'damian@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
