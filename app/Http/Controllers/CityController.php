<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends Controller
{
    public function store(CreateCityRequest $request)
    {
        $city = new City;
        $city->city_name = $request->city_name;
        $city->country_code = $request->country_code;
        $city->save();

        return new CityResource($city);
    }
}
