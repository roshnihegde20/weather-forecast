<?php

namespace Database\Seeders;

use App\Models\ClientKey;
use Illuminate\Database\Seeder;

class ClientKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientDetails = [
            [
                'id' => 1,
                'name' => 'Open weather',
                'unique_code' => 1,
                'secret_key' => '858f15fed9292cbe25c341a754c55e45',

            ],
        ];

        foreach ($clientDetails as $clientDetail) {
            ClientKey::firstOrCreate($clientDetail);
        }

    }
}
