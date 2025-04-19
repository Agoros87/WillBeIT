<?php

namespace Database\Factories;

use App\Models\Center;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CenterFactory extends Factory
{
    protected $model = Center::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'province' => $this->faker->state(),
            'postal_code' => $this->faker->postcode(),
            'email' => $this->faker->unique()->safeEmail(),
            'director_email' => $this->faker->unique()->safeEmail(),
            'director_name' => $this->faker->name(),
            'erasmus_coordinator' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'badge' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
