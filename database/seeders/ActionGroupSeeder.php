<?php

namespace Database\Seeders;

use App\Models\ActionGroup;
use Illuminate\Database\Seeder;

class ActionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActionGroup::create([
            'key' => 'docker.registry',
            'title' => 'Реестр докер-образов',
        ]);

        ActionGroup::create([
            'key' => 'project',
            'title' => 'Проекты',
        ]);

//        ActionGroup::create([
//            'key' => 'project-group',
//            'title' => 'Группы проектов',
//        ]);
    }
}
