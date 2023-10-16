<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherDataResource;
use App\Models\ClientKey;
use App\Models\WeatherData;
use App\Models\City;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class WeatherController extends Controller
{
    public function store(Request $request)
    {
        try {
            $client = new Client;
            $tokenAPIResponse = $client->request('GET', 'https://api.openweathermap.org/data/3.0/onecall?lat=40.7128&lon=-74.0060&'.$this->clientData());
            if ($tokenAPIResponse->getStatusCode() == 200) {
                $decodeweatherResponse = json_decode($tokenAPIResponse->getBody(), true);
                $weatherData = new WeatherData;
                $weatherData->city_id = $decodeweatherResponse->city_id;
                $weatherData->longitude = $decodeweatherResponse->lon;
                $weatherData->latitude = $decodeweatherResponse->lat;
                $weatherData->temperature = $decodeweatherResponse->current->temp;
                $weatherData->humidity = $decodeweatherResponse->current->humidity;
                $weatherData->pressure = $decodeweatherResponse->current->pressure;
                $weatherData->save();

                return new WeatherDataResource($weatherData);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function index(Request $request)
    {
        $cityIds[] = $request->filter['cityIds'];
        $cities = City::whereIn('id',  $cityIds)->pluck('name');
        $cityNames = Arr::map($cities, function ($city) {
            return 'q ='.$city;
        });
        try {
            $client = new Client;
            $tokenAPIResponse = $client->request('GET', 'api.openweathermap.org/data/2.5/forecast?'.$cityNames.'&'.$this->clientData());
            $decodeweatherResponse = json_decode($tokenAPIResponse->getBody(), true);

            return $decodeweatherResponse;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function clientData()
    {

        $secretKey = ClientKey::where('unique_code', ClientKey::VALUE_UNIQUE_CODE)->value('secret_key');
        $apiClientDetails = [
            'appid' => $secretKey,
        ];

        return $apiClientDetails;
    }
}
