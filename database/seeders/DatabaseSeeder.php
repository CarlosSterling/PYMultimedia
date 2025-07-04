<?php

namespace Database\Seeders;

use App\Models\Convenios;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Alaia Sterling',
            'email' => 'Alaia@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        Convenios::factory(7)->create([
            'activo' => true,
            'orden' => 1,
        ]);
    }
}
