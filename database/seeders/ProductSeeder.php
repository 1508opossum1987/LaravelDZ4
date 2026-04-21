<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $brands = Brand::query()
            ->where('active', true)
            ->get();
        $categories = Category::query()
            ->where('active', true)
            ->get();
        $countries = Country::query()
            ->where('active', true)
            ->get();

        for($i = 0; $i < 50; $i++) {
            Product::factory([
                'brand_id' => $brands->random()->id,
                'category_id' => $categories->random()->id,
                'country_id' => $countries->random()->id,
            ])->create();
        }
    }
}
