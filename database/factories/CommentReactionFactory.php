<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\CommentReaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentReactionFactory extends Factory
{
    protected $model = CommentReaction::class;

    public function definition(): array
    {
        return [
            'comment_id' => Comment::factory(),
            'user_id' => User::factory(),
            'reaction_type' => $this->faker->randomElement(['like', 'love', 'angry', 'sad', 'laugh']),
        ];
    }
}
