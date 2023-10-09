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
            'username' => 'Depinazul',
            'phone' => '00011112233',
            'email' => 'emilli@gmail.com',
            'password' => Hash::make('holamundo')
            ])
        ->assignRole('admin');
    }
}
