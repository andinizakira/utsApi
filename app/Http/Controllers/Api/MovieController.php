<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MovieApiService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $apiService;

    // Menambahkan dependensi pada constructor
    public function __construct(MovieApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    // Method untuk mendapatkan semua tim
    public function getAllmovie()
    {
        // Ambil data tim dari API
        $movie = $this->apiService->getAllmovie();
        return view('movie', ['data' => $movie]);

    }
}