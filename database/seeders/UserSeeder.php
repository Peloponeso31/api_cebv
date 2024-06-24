<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        /*
         * Test users for permissions
         */
        $admin = User::create([
            'name' => 'Admin Test',
            'email' => 'q@q.com',
            'password' => Hash::make('qqqq')
        ]);

        $user = User::create([
            'name' => 'User Test',
            'email' => 'user@user.com',
            'password' => Hash::make('user')
        ]);

        $guest = User::create([
            'name' => 'Guest Test',
            'email' => 'guest@guest.com',
            'password' => Hash::make('guest')
        ]);

        $admin->assignRole('admin_test');
        $user->assignRole('user_test');
        $guest->assignRole('guest_test');
    }
}
