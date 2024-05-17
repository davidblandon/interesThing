@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">
    <h1 style="text-align: center; margin-top: 20px;">Weather Information</h1>
    <div class="weather-info" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; text-align: center;">
        <div class="weather-item">
            <span>Coordinates:</span> [Latitude: {{ $viewData['weather']['coord']['lat'] }}, Longitude: {{ $viewData['weather']['coord']['lon'] }}]
        </div>
        <div class="weather-item">
            <span>Weather:</span> {{ $viewData['weather']['weather'][0]['main'] }} ({{ $viewData['weather']['weather'][0]['description'] }})
        </div>
        <div class="weather-item">
            <span>Temperature:</span> {{ $viewData['weather']['main']['temp'] }} K
        </div>
        <div class="weather-item">
            <span>Feels Like:</span> {{ $viewData['weather']['main']['feels_like'] }} K
        </div>
        <div class="weather-item">
            <span>Pressure:</span> {{ $viewData['weather']['main']['pressure'] }} hPa
        </div>
        <div class="weather-item">
            <span>Humidity:</span> {{ $viewData['weather']['main']['humidity'] }}%
        </div>
        <div class="weather-item">
            <span>Visibility:</span> {{ $viewData['weather']['visibility'] }} meters
        </div>
        <div class="weather-item">
            <span>Wind Speed:</span> {{ $viewData['weather']['wind']['speed'] }} m/s
        </div>
        <div class="weather-item">
            <span>Wind Direction:</span> {{ $viewData['weather']['wind']['deg'] }}&deg;
        </div>
        <div class="weather-item">
            <span>Cloudiness:</span> {{ $viewData['weather']['clouds']['all'] }}%
        </div>
        <div class="weather-item">
            <span>Sunrise:</span> {{ date('Y-m-d H:i:s', $viewData['weather']['sys']['sunrise']) }}
        </div>
        <div class="weather-item">
            <span>Sunset:</span> {{ date('Y-m-d H:i:s', $viewData['weather']['sys']['sunset']) }}
        </div>
        <div class="weather-item">
            <span>Timezone:</span> {{ $viewData['weather']['timezone'] }} seconds
        </div>
        <div class="weather-item">
            <span>City ID:</span> {{ $viewData['weather']['id'] }}
        </div>
        <div class="weather-item">
            <span>City Name:</span> {{ $viewData['weather']['name'] }}
        </div>
        <div class="weather-item">
            <span>Response Code:</span> {{ $viewData['weather']['cod'] }}
        </div>
    </div>
</div>
@endsection
