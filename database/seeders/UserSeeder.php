<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['superadmin', 'admin', 'teacher', 'student'];

        foreach ($roles as $role) {
            $user = User::create([
                'center_id' => Center::inRandomOrder()->firstOrFail()->id,
                'name' => ucfirst(str_replace('-', ' ', $role)),
                'surname' => ucfirst(str_replace('-', ' ', $role)),
                'email' => str_replace('-', '', $role) . '@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123'),
            ]);

            $user->assignRole($role);
        }

        User::factory(10)->create();
    }
}
