<?php

namespace Database\Factories;

use App\Models\Podcast;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->city();
        return [
            'video_id' => Video::inRandomOrder()->first()->id,
            'podcasts_id' => Podcast::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => ucfirst($title),
            'slug' => Str::slug($title . '-' . Str::random(6)),
            'body' => $this->faker->realText(),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
