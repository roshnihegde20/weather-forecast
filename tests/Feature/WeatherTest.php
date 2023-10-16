<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSaveWeatherData(): void
    {
        $response = $this->postJson('/weather', [
            'city_id' => '1',
            'temperature' => '25',
            'humidity' => '60',
            'pressure' => 1013,
        ]);
        $guzzle = Mockery::mock(\GuzzleHttp\Client::class);
        $guzzle->shouldReceive('get')
            ->with('https://openweathermap.org/api')
            ->andReturn('OK');

        $response->assertJson(['message' => 'Success']);
        $this->assertDatabaseHas('weather_data', [
            'city_id' => 1,
            'temperature' => 25,
            'humidity' => 60,
            'pressure' => 1013,
        ]);

    }

    public function testgetWeatherData(): void
    {
        $response = $this->get('/weather?cityId=2');
        $guzzle = Mockery::mock(\GuzzleHttp\Client::class);
        $guzzle->shouldReceive('get')
            ->with('https://openweathermap.org/forecast5')
            ->andReturn('OK');

        $response->assertJson(['message' => 'Success']);
        $this->assertDatabaseHas('weather_data', [
            'city_id' => 2,
            'temperature' => 45,
            'humidity' => 70,
            'pressure' => 1012,
        ]);

    }
}
