<?php

namespace Database\Seeders;

use App\Models\Right;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Right::create([
            'key' => 'docker.registry.pull',
            'title' => 'Чтение из реестра',
        ]);

        Right::create([
            'key' => 'docker.registry.push',
            'title' => 'Запись в реестр',
        ]);
    }
}
