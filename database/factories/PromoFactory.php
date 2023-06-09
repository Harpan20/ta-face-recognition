<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
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
            'image_desktop' => 'https://source.unsplash.com/random',
            'image_mobile' => 'https://source.unsplash.com/random',
            'is_publish' => fake()->boolean(),
            'started_at' => fake()->dateTime(),
            'ended_at' => fake()->dateTime(),
        ];
    }
}
