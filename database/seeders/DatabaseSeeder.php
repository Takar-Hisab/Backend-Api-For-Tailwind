<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Plan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vendor;
use Database\Factories\VendorFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        Plan::factory(15)->create();

//        User::factory(500)
//            ->has(Vendor::factory())
//            ->has(Customer::factory()
//                ->has(Plan::factory()->count(1)))
//            ->create();
//
//        User::factory(100)
//            ->has(Vendor::factory()->count(1))
//            ->has(Customer::factory()->has(Plan::factory()->count(1)))
//            ->create();

//        User::create([
//            'name' => 'Admin',
//            'email' => 'admin@admin.com',
//            'password' => Hash::make(12345678),
//            'phone' => "01522222242",
//            'type' => 'admin'
//        ]);
        User::create([
            'name' => 'Vendor',
            'email' => 'vendor@vendor.com',
            'password' => Hash::make(12345678),
            'phone' => "01522222245",
            'type' => 'vendor'
        ]);
        User::create([
            'name' => 'Customer',
            'email' => 'customer@customer.com',
            'password' => Hash::make(12345678),
            'phone' => "01522222246",
            'type' => 'custoemr'
        ]);

//        User::factory()->createMany([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//            'type' => 'vendor'
//        ],[
//            'name' => 'Admin',
//            'email' => 'admin@admin.com',
//            'password' => Hash::make(12345678),
//            'type' => 'vendor'
//        ]);
    }
}
