<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Chamado;
use App\Models\User;  

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('senha123'),
            'role' => 'admin',
            'ativo' => true,
        ]);

        User::factory()->count(5)->create([
            'role' => 'requerente',
        ]);

        User::factory()->count(5)->create([
            'role' => 'responsavel',
        ]);
    }
}
