<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'duration' => $this->faker->optional()->randomElement(['monthly', 'annual']),
            'max_products' => $this->faker->numberBetween(0, 100),
            'max_users' => $this->faker->numberBetween(1, 100),
            'max_invoice' => $this->faker->numberBetween(1, 100),
            'storage_limit' => $this->faker->randomFloat(2, 0, 100),
            'enable_custdomain' => $this->faker->boolean(),
            'additional_page' => $this->faker->optional()->sentence(),
            'blog' => $this->faker->boolean(),
            'enable_custsubdomain' => $this->faker->boolean(),
            'description' => $this->faker->optional()->paragraph(),
            'image' => $this->faker->optional()->imageUrl(),
            'status' => $this->faker->boolean(),
        ];
    }
}
