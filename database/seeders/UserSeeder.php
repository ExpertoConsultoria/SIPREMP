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
        User::create(
        // [
        //     'name' => 'Emilli Rodriguez Reyes',
        //     'username' => 'Depinazul',
        //     'phone' => '00011112233',
        //     'email' => 'emilli@gmail.com',
        //     'password' => Hash::make('holamundo')
        // ],
        // [
        //     'name' => 'Luis Lopez Rios',
        //     'username' => 'Esteban',
        //     'phone' => '951-321-7674',
        //     'email' => 'esteban123@gmail.com',
        //     'password' => Hash::make('esteban')
        // ],
        [
            'name' => 'Carlos Almaraz Perez',
            'username' => 'Ayken',
            'phone' => '951-454-3456',
            'email' => 'CarlosFront@gmail.com',
            'password' => Hash::make('carlos')
        ]
        )
        ->assignRole('N5:18A:F');
    }
}
