<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\ActionGroup;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actionGroup = ActionGroup::where('key', 'docker.registry')->first();
//        $projectGroup = ActionGroup::where('key', 'project-group')->first();
        $project = ActionGroup::where('key', 'project')->first();

        Action::create([
            'key' => 'docker.registry.pull',
            'title' => 'Чтение из реестра',
            'group_id' => $actionGroup->id,
        ]);

        Action::create([
            'key' => 'docker.registry.push',
            'title' => 'Запись в реестр',
            'group_id' => $actionGroup->id,
        ]);

        Action::create([
            'key' => 'project.list.all',
            'title' => 'Просмотр списка всех проектов и их групп',
            'group_id' => $project->id,
        ]);
    }
}
