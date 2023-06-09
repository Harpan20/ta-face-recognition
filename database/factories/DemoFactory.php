<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demo>
 */
class DemoFactory extends Factory
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
            // 'product_id' => Product::factory(),
            'product_id' => rand(1, 4),
            'name' => $this->faker->name(),
            'company_name' => $this->faker->company(),
            'email' => $this->faker->email(),
            'number' => $this->faker->numerify('###########'),
            'industry' => $this->faker->randomElement(['tech', 'goverment', 'bank']),
            'needs' => $this->faker->sentence(30),
        ];
    }
}
