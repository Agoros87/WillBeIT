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
        $tagNames = [
            'Tecnología',
            'Programación',
            'Laravel',
            'PHP',
            'JavaScript',
            'Desarrollo Web',
            'Inteligencia Artificial',
            'Machine Learning',
            'Tutoriales',
            'Noticias',
            'Opinión',
            'Recursos',
            'Frameworks',
            'Seguridad',
            'Open Source',
            'Backend',
            'Frontend',
            'DevOps',
            'Cloud',
            'API',
        ];

        $tags = collect($tagNames)->map(function ($name) {
            return Tag::create(['name' => $name]);
        });

        Post::all()->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );
        });

        Video::all()->each(function ($video) use ($tags) {
            $video->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );
        });

        Podcast::all()->each(function ($podcast) use ($tags) {
            $podcast->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );
        });
    }
}