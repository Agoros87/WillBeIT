<?php

namespace Database\Seeders;

use App\Models\Podcast;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::factory(10)->create();

        Post::all()->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(1)->pluck('id')->toArray());
        });

        Video::all()->each(function ($video) use ($tags) {
            $video->tags()->attach($tags->random(1)->pluck('id')->toArray());
        });

        Podcast::all()->each(function ($podcast) use ($tags) {
            $podcast->tags()->attach($tags->random(1)->pluck('id')->toArray());
        });
    }
}
