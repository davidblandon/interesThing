<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class TimeTravelService
{
    public function getTravels(): array
    {
        $apiUrl = "http://temporal.migueljaramillo.tech/api/travels";

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }
}