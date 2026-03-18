<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectUserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $project1 = Project::where('key', 'project-1')->first();
//        $project2 = Project::where('key', 'project-2')->first();
//        $project3 = Project::where('key', 'project-3')->first();

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
