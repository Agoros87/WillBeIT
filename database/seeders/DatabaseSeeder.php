<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CenterSeeder::class,
            UserSeeder::class,
            VideoSeeder::class,
            PodcastSeeder::class,
            PostSeeder::class,
            TagSeeder::class,
        ]);
    }
}
