<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => bcrypt('12345678'),
            'is_admin' => true
        ]);
    }
}
