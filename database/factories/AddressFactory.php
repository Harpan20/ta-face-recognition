<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->secondaryAddress(),
            'address' => fake()->address(),
            'province' => fake()->state(),
            'district' => fake()->city(),
            'sub_district' => fake()->citySuffix(),
            'postal_code' => fake()->postcode(),
            'longitude' => fake()->longitude(),
            'latitude' => fake()->latitude(),
            'is_main' => fake()->boolean(),
        ];
    }
}
