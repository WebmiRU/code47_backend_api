<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'key' => 'project-1',
            'title' => 'Проект 1',
        ]);

        Project::create([
            'key' => 'project-2',
            'title' => 'Проект 2',
        ]);

        Project::create([
            'key' => 'project-3',
            'title' => 'Проект 3',
        ]);
    }
}
