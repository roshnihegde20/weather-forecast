<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'city_id' => $this->city_id,
            'temperature' => $this->temperature,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'humidity' => $this->humidity,
            'pressure' => $this->pressure,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
