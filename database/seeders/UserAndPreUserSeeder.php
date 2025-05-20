<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PreUser;

class UserAndPreUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuário completo
        User::create([
            'name' => 'Usuário Teste',
            'email' => 'example@example.com',
            'password' => Hash::make('12345678'),
        ]);

        // Usuário pré-cadastrado
        PreUser::create([
            'name' => 'Pré Usuário',
            'email' => 'preusuario@teste.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
