<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ActionGroupSeeder::class,
            ActionSeeder::class,
            UserGroupSeeder::class,
            UserSeeder::class,
            ProjectGroupSeeder::class,
            ProjectSeeder::class,
            ProjectAppSeeder::class,
            ProjectUserActionSeeder::class,
        ]);
    }
}
