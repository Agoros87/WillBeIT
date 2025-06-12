<?php

namespace Database\Factories;

use App\Models\Podcast;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commentableTypes = [Post::class, Podcast::class, Video::class];
        $type = $this->faker->randomElement($commentableTypes);
        $model = $type::inRandomOrder()->first();

        return [
            'content' => $this->faker->sentence(10),
            'user_id' => User::inRandomOrder()->first()->id,
            'commentable_id' => $model->id,
            'commentable_type' => $type,
        ];
    }

}
