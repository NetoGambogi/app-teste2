<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => Str::random(20),
            'email' => Str::random(20).'@example.com',
            'password' => Hash::make('password'),
            'role' => $roles[array_rand($roles)],
            'ativo' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
