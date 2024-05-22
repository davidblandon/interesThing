<?php
/**
 * Created by: Juan MArtín Espitia
 */

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Services\TimeTravelService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class TimeTravelApiController extends Controller
{
    protected $timeTravelService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TimeTravelService $timeTravelService)
    {
        $this->timeTravelService = $timeTravelService;
    }



    public function index(): JsonResponse
    {

        $timeTravels = $this->timeTravelService->getTravels();

        return response()->json($timeTravels, 200);

    }
}
