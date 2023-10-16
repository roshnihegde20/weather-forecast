<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::post('login', [AuthController::class, 'login']);

Route::post('/weather', [WeatherController::class, 'store']);

Route::get('/weather', [WeatherController::class, 'index']);

Route::post('/city', [CityController::class, 'store']);

// Route::middleware('jwt.verify')->group(function () {

// });
