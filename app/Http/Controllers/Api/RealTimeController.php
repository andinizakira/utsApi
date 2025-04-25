<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RealTimeApiService;
use Illuminate\View\View;

class RealTimeController extends Controller
{
    protected RealTimeApiService $apiService;

    // Inject service via constructor
    public function __construct(RealTimeApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Get all real-time data and return to Blade view
     *
     * @return View
     */
    public function getAllrealtime(): View
    {
        $realtime = $this->apiService->getAllRealTime();

        return view('realtime', ['data' => $realtime]);
    }
}
