<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            'title' => $this->faker->realText(40),
            'description' => $this->faker->realText(250),
            'genre' => $this->faker->randomElement(['Action','Comedy','Drama','Horror','Romance','Thriller']),
            'release_date'=>$this->faker->date(),
        ];
    }
}
