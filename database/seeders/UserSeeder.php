<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'mohammed elmostaine',
            'email' => 'mohammedelmostaine@gmail.com',
            'role' => 'admin', // Optionally set a role for this user
        ]);
    }
}
