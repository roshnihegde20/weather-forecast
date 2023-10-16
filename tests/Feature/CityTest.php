<?php

namespace Tests\Feature;

use Tests\TestCase;

class CityTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInsertCity(): void
    {
        $cityData = [
            'name' => 'India',
            'country_code' => 'IN',
        ];

        $response = $this->post('/cities', $cityData);
        $response->assertStatus(201);
        $response->assertDatabaseHas([
            'name' => 'India',
            'country_code' => 'IN',
        ]);
    }
}
