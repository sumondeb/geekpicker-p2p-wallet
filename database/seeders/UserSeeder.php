<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'User A',
            'email' => 'user_a@gmail.com',
            'password' => bcrypt('123456'),
            'currency' => 'USD',
            'wallet' => 100,
        ]);

        User::factory()->create([
            'name' => 'User B',
            'email' => 'user_b@gmail.com',
            'password' => bcrypt('123456'),
            'currency' => 'EUR',
            'wallet' => 0,
        ]);
    }
}
