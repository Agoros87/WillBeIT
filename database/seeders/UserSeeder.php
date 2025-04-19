<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'center_id' => Center::inRandomOrder()->firstOrFail()->id,
            'name' => 'Test User',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
        ]);
    }
}
