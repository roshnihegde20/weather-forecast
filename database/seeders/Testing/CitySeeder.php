<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'id' => 2,
                'name' => 'United States',
                'country_code' => 'US',
            ],
        ];

        foreach ($cities as $city) {
            City::firstOrCreate($city);
        }
    }
}
