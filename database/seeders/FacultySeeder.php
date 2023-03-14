<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i = 0; $i < 10; $i++){
            Faculty::query()->create([
                'name' => fake()->name,
                'city' => fake()->city,
                'country' => fake()->country,
                'description' => fake()->text(30)
            ]);
        }

    }
}
