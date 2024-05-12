<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'vendor_id' => Vendor::factory(),
            'plan_id' => Plan::factory(),
            'register_date' => Carbon::now('UTC'),
            'referal_code' => uniqueString(6)
        ];
    }
}
