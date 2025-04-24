<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MovieController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/movies', [MovieController::class, 'index']);


Route::get('api/movie', [MovieController::class, 
'getAllmovie']);