<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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

        $this->faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($this->faker));

        $title = $this->faker->unique()->movie;

        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'studio' => $this->faker->studio,
            'runtime' => $this->faker->runtime,
            'description' => $this->faker->realText(2500),
            'genre' => $this->faker->randomElement(['Action','Comedy','Drama','Horror','Romance','Thriller']),
            'release_date'=>$this->faker->date(),
        ];
    }
}
