<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(1),
            'description' => fake()->sentence(25),
            'image_hero' => 'https://source.unsplash.com/random',
            'image_feature' => 'https://source.unsplash.com/random',
            'image_benefit' => 'https://source.unsplash.com/random',
            'image_benefit_mobile' => 'https://source.unsplash.com/random',
        ];
    }
}
