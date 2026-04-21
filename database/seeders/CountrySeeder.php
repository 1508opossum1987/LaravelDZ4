<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{

    public function run(): void
    {
        $countries = [
            'Россия',
            'США',
            'Китай',
            'Германия',
            'Великобритания',
            'Франция',
            'Япония',
            'Южная Корея',
            'Канада',
            'Италия',
            'Испания',
            'Австралия',
            'Индия',
            'Бразилия',
            'Мексика',
            'Турция',
            'Нидерланды',
            'Швейцария',
            'Швеция',
            'ОАЭ',
        ];

        foreach ($countries as $country) {
            Country::query()
                ->firstOrCreate(['name' => $country], ['name' => $country]);
        }
    }
}
