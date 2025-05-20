<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class WeatherController extends Controller
{
    public function getMultiCityWeather(Request $request)
    {
        $cities = $request->query('cities', 'London,Paris,Tokyo'); // default cities
        $cityList = explode(',', $cities);

        $apiKey = env('OPENWEATHER_API_KEY');
        $weatherData = [];

        foreach ($cityList as $city) {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => trim($city),
                'appid' => $apiKey,
                'units' => 'metric'
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $weatherData[] = [
                    'city' => $city,
                    'temperature' => $data['main']['temp'],
                    'description' => $data['weather'][0]['description'],
                    'humidity' => $data['main']['humidity'],
                ];
            } else {
                $weatherData[] = [
                    'city' => $city,
                    'error' => 'Unable to fetch weather data'
                ];
            }
        }

        return view('Display', ['weatherData' => $weatherData]);
}

    public function showRandomUsers(Request $request)
    {
        $count = $request->query('count', 3); // default 3 users

        $response = Http::get("https://randomuser.me/api/", [
            'results' => $count
        ]);

        if ($response->successful()) {
            $users = $response->json()['results'];
            return view('UsersView', ['users' => $users]);
        } else {
            return view('UsersView', ['users' => []]);
        }
    }

}
