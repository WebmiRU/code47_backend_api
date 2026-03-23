<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectUserActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project1 = Project::where('key', 'project-1')->first();
        $project2 = Project::where('key', 'project-2')->first();
        $project3 = Project::where('key', 'project-3')->first();

        $userFrontend1 = User::where('login', 'frontend1')->first();
        $userBackend1 = User::where('login', 'backend1')->first();

        $actionDockerRegistryPull = Action::where('key', 'docker.registry.pull')->first();
        $actionDockerRegistryPush = Action::where('key', 'docker.registry.push')->first();


        $project1->users()->attach($userBackend1, ['action_id' => $actionDockerRegistryPull->id]);
        $project1->users()->attach($userBackend1, ['action_id' => $actionDockerRegistryPush->id]);
//        $project1->users()->attach($userFrontend1->id, ['action_id' => $actionDockerRegistryPush->id]);
    }
}
