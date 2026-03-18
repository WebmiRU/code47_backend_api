<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserGroup::create([
            'key' => 'frontend_developers',
            'title' => 'Фронтэнд разработчики',
        ]);

        UserGroup::create([
            'key' => 'backend_developers',
            'title' => 'Бекэнд разработчики',
        ]);
    }
}
