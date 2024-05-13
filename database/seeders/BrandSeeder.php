<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{

    protected $brand = Brand::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::factory()->count(20)->create();
    }
}
