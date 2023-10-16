<?php

namespace Database\Seeders;

use App\Models\WeatherData;
use Illuminate\Database\Seeder;

class WeatherDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weatherData = [
            [
                'id' => 2,
                'city_id' => 2,
                'temperature' => 45,
                'longitude' => -94.04,
                'latitude' => 33.44,
                'humidity' => 70,
                'pressure' => 1012,
            ],

        ];

        foreach ($weatherData as $weather) {
            WeatherData::firstOrCreate($weather);
        }
    }
}
