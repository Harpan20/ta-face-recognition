<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimony>
 */
class TestimonyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->jobTitle(),
            'origin' => fake()->company(),
            'testimony' => fake()->sentence(25),
            'image' => 'https://source.unsplash.com/random/80x80',
        ];
    }
}
