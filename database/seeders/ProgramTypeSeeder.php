<?php

namespace Database\Seeders;

use App\Models\ProgramType;
use Illuminate\Database\Seeder;

class ProgramTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramType::query()->create([
            'name' => 'Bachelor',
        ]);
        ProgramType::query()->create([
            'name' => 'Specialist',
        ]);
        ProgramType::query()->create([
            'name' => 'Master',
        ]);
        ProgramType::query()->create([
            'name' => 'Doctoral',
        ]);
    }
}
