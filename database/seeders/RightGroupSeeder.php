<?php

namespace Database\Seeders;

use App\Models\RightGroup;
use Illuminate\Database\Seeder;

class RightGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RightGroup::create([
            'key' => 'docker.registry',
            'title' => 'Реестр докер-образов',
        ]);
    }
}
