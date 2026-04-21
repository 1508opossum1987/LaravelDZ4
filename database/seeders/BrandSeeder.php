<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Apple',
            'Samsung',
            'Xiaomi',
            'Huawei',
            'OnePlus',
            'Google',
            'Sony',
            'LG',
            'Lenovo',
            'Dell',
            'HP',
            'Acer',
            'Asus',
            'MSI',
            'Razer',
            'Microsoft',
            'Nokia',
            'Motorola',
            'Realme',
            'Oppo',
        ];

        foreach ($brands as $brand) {
            Brand::query()
                ->firstOrCreate(['name' => $brand], ['name' => $brand]);
        }
    }
}
