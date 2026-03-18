<?php

namespace Database\Seeders;

use App\Models\Right;
use App\Models\RightGroup;
use Illuminate\Database\Seeder;

class RightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rightGroup = RightGroup::where('key', 'docker.registry')->first();

        Right::create([
            'key' => 'docker.registry.pull',
            'title' => 'Чтение из реестра',
            'group_id' => $rightGroup->id,
        ]);

        Right::create([
            'key' => 'docker.registry.push',
            'title' => 'Запись в реестр',
            'group_id' => $rightGroup->id,
        ]);
    }
}
