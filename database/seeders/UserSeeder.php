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
            'email' => 'admin@admin',
            'password' => Hash::make('admin@admin'),
            'role' => 'admin',
            'ativo' => true,
        ]);

        User::create([
            'name' => 'Requerente',
            'email' => 'requerente@requerente',
            'password' => Hash::make('requerente@requerente'),
            'role' => 'requerente',
            'ativo' => true,
        ]);

        User::create([
            'name' => 'Responsavel',
            'email' => 'responsavel@responsavel',
            'password' => Hash::make('responsavel@responsavel'),
            'role' => 'responsavel',
            'ativo' => true,
        ]);

        User::factory()->count(10)->create([
            'role' => 'requerente',
        ]);

        User::factory()->count(10)->create([
            'role' => 'responsavel',
        ]);
    }
}
