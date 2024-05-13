<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Store;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{

    protected $modal = Store::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function(){return User::inRandomOrder()->value('id');},
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'about' => $this->faker->paragraph,
            'tagline' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'lang' => 'en',
            'currency' => '$',
            'currency_code' => 'USD',
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zipcode' => $this->faker->postcode,
            'country' => $this->faker->country,
            'logo' => $this->faker->imageUrl(400, 400), 
            'favicon' => $this->faker->imageUrl(400, 400),
        ];
    }
}
