<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getWeather(string $lat, string $lon): array
    {
        $apiKey = env('OPENWEATHER_API_KEY');
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$apiKey}";

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            return $response->json();
        }

    }
}
