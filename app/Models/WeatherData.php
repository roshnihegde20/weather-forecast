<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    protected $fillable = [
        'city_id',
        'temperature',
        'longitude',
        'latitude',
        'humidity',
        'pressure',
    ];
}
