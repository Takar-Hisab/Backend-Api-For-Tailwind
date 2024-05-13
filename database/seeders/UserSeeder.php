<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Vendor',
                'email' => 'vendor@vendor.com',
                'password' => Hash::make(12345678),
                'phone' => "01522222245",
                'type' => 'vendor'
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@customer.com',
                'password' => Hash::make(12345678),
                'phone' => "01522222246",
                'type' => 'customer'
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make(12345678),
                'phone' => "01522222249",
                'type' => 'user'
            ]
        ]);
    }
}
