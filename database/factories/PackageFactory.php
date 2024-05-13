<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => function(){return Service::inRandomOrder()->value('id');},
            'name' => $this->faker->name,
            'position' => $this->faker->randomDigit(),
            'price' => $this->faker->numberBetween(500, 5000),
            'description' => $this->faker->sentence()
        ];
    }
}
