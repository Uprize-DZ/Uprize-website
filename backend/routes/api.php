<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeHeroController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TrustedByController;

// Home Heroes Routes
Route::get('/home-heroes', [HomeHeroController::class, 'index']);

// Services Routes
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/services/{slug}', [ServicesController::class, 'show']);

// Trusted By Routes
Route::get('/trusted-by', [TrustedByController::class, 'index']);

/* you can use this to fetch them with react 


// Fetch home heroes
fetch('/api/home-heroes')

// Fetch all services
fetch('/api/services')

// Fetch single service
fetch('/api/services/web-development')

// Fetch clients
fetch('/api/trusted-by')

*/