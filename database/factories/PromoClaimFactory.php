<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PromoClaim>
 */
class PromoClaimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'company_name' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'country_id' => rand(1, 242),
            'phone_number' => $this->faker->numerify('##########'),
            'product_id' => rand(1, 4),
        ];
    }
}
