<?php

namespace Database\Seeders;

use App\Models\ProjectGroup;
use Illuminate\Database\Seeder;

class ProjectGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectGroup::create([
            'key' => 'project-project-1',
            'title' => 'Группа проектов 1',
        ]);

        ProjectGroup::create([
            'key' => 'project-project-2',
            'title' => 'Группа проектов 2',
        ]);
    }
}
