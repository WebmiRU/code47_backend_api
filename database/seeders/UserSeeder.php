<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'login' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'comment' => 'Администратор',
        ]);

        User::create([
            'login' => 'root',
            'email' => 'admin@example.com',
            'password' => Hash::make('root_password'),
            'comment' => 'Системный пользователь (администратор)',
        ]);
    }
}
