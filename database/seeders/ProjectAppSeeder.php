<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project1 = Project::where('key', 'project-1')->first();
        $project2 = Project::where('key', 'project-2')->first();
        $project3 = Project::where('key', 'project-3')->first();

        $project1->apps()->create([
            'key' => 'nginx',
            'title' => 'Nginx web server',
        ]);

        $project1->apps()->create([
            'key' => 'php',
            'title' => 'PHP',
        ]);
    }
}
