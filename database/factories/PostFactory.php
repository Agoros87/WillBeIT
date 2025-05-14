<?php

namespace Database\Factories;

use App\Models\Podcast;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'video_id' => Video::inRandomOrder()->first()->id,  // Obtener un video aleatorio existente
            'podcasts_id' => Podcast::inRandomOrder()->first()->id,  // Obtener un podcast aleatorio existente
            'user_id' => User::inRandomOrder()->first()->id,  // Obtener un usuario aleatorio existente
            'title' => $this->faker->word(),
            'slug' => fake()->slug(),
            'body' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ];
    }
}
