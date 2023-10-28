<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        User::create([
                'name' => 'Emilli Rodriguez Reyes',
                'username' => 'Emilli',
                'phone' => '951-459-0568',
                'email' => 'emilli@gmail.com',
                'password' => Hash::make('holamundo')
        ])->assignRole('N7:GS:17A');

        User::create([
                'name' => 'Luis Lopez Rios Esteban',
                'username' => 'Esteban',
                'phone' => '951-321-7674',
                'email' => 'esteban@gmail.com',
                'password' => Hash::make('holamundo')
        ])->assignRole('N6:17A');

        User::create([
                'name' => 'Carlos Almaraz Perez',
                'username' => 'Ayken',
                'phone' => '951-454-3456',
                'email' => 'carlos@gmail.com',
                'password' => Hash::make('holamundo')
        ])->assignRole('N5:18A:F');

        User::create([
                'name' => 'Victor Gabriel Valencia Garcia',
                'username' => 'Depinzaul',
                'phone' => '951-459-3456',
                'email' => 'victor@gmail.com',
                'password' => Hash::make('holamundo')
        ])->assignRole('N4:SEGE');

        User::create([
                'name' => 'Iver Ivan Cruz Perez',
                'username' => 'Señor De Rancho 34',
                'phone' => '951-444-3456',
                'email' => 'iver@gmail.com',
                'password' => Hash::make('holamundo')
        ])->assignRole('N3:UNTE');
    }
}
