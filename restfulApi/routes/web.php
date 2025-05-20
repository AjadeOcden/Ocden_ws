<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WeatherController;
use App\Http\Controllers\Http;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/weather/multiple', [WeatherController::class, 'getMultiCityWeather'])->name('weather');
Route::get('/random-users/display', [WeatherController::class, 'showRandomUsers']);
