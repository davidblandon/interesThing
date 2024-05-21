<?php
/**
 * Created by: Juan MArtín Espitia
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeatherApiController extends Controller
{
    protected $weatherService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request): View
    {
        $lat = $request->input('lat', '4.6097');
        $lon = $request->input('lon', '-74.0817');

        $weatherResponse = $this->weatherService->getWeather($lat, $lon);
        $viewData = [];
        $viewData['weather'] = $weatherResponse;
        $viewData['title'] = 'Weather - InteresThing';

        return view('api.weather')->with('viewData', $viewData);
    }
}
