<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\Tag;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Center::factory(1)->create();
        User::factory(1)->create();
        Video::factory(1)->create();
        Tag::factory(1)->create();
        $video = Video::first();
        $tag = Tag::first();
        $video->tags()->attach($tag);
    }
}
