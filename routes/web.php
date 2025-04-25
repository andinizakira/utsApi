<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RealTimeController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/movies', [MovieController::class, 'index']);


Route::get('api/realtime', [RealTimeController::class, 
'getAllrealtime']);