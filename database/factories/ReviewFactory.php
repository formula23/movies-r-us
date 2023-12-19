<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movie_id' => Movie::inRandomOrder()->first()->id ?? Movie::factory()->create()->id,
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            'rating' => $this->faker->numberBetween(1, 10),
            'comment' => $this->faker->realText(500),
        ];
    }
}
