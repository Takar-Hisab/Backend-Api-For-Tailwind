<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{


    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     * 
     */
    public function definition(): array
    {
        return [
            
            'user_id' => function(){return User::inRandomOrder()->value('id');},
            'category_id' => function(){return Category::inRandomOrder()->value('id');},
            'brand_id' => function(){return Brand::inRandomOrder()->value('id');},
            'store_id' => function(){return Store::inRandomOrder()->value('id');},
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->sentence(),
            'sku' => Str::random(8),
            'price' => $this->faker->numberBetween(500, 5000),
            'quantity' => $this->faker->randomDigit(),
            'description' => $this->faker->sentence(),
            'bar_code' =>  $this->faker->ean13(),
            'image' =>  $this->faker->imageUrl(640, 480,),
            'created_at'    =>now(),
            'updated_at'    => now()
        ];
    }
}
