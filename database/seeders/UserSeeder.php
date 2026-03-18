<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groupFrontendDevelopers = UserGroup::where('key', 'frontend_developers')->first();
        $groupBackendDevelopers = UserGroup::where('key', 'backend_developers')->first();

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

        $userFrontend1 = User::create([
            'login' => 'frontend1',
            'email' => 'frontend1@example.com',
            'password' => Hash::make('frontend1_password'),
            'comment' => 'Тестовый фронтэнд разработчик 1',
        ]);

        $userBackend1 = User::create([
            'login' => 'backend1',
            'email' => 'backend1@example.com',
            'password' => Hash::make('backend1_password'),
            'comment' => 'Тестовый Бекэнд разработчик 1',
        ]);


        // Добавляем пользователей в группы
        DB::table('user_m2m_user_group')->insert([
            'user_id'       => $userFrontend1->id,
            'user_group_id' => $groupFrontendDevelopers->id,
             'created_at' => now(),
             'updated_at' => now(),
        ]);

        DB::table('user_m2m_user_group')->insert([
            'user_id'       => $userBackend1->id,
            'user_group_id' => $groupBackendDevelopers->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
