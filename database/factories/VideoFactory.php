<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first() ?? Center::inRandomOrder()->first(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
