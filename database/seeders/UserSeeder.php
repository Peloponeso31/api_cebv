<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/*
 * This seeder is used to create a test user for the application.
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
