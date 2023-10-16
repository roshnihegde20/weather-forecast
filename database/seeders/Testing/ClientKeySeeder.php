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
                'secret_key' => 'gh6767ghtythgtyhgrtyhu898',

            ],
        ];

        foreach ($clientDetails as $clientDetail) {
            ClientKey::firstOrCreate($clientDetail);
        }

    }
}
