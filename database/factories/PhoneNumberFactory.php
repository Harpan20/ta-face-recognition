<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhoneNumber>
 */
class PhoneNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'country_id' => rand(1, 242),
            'number' => fake()->numerify('##########'),
            // 'number' => fake()->phoneNumber(),
            'is_main' => fake()->boolean(),
        ];
    }
}
