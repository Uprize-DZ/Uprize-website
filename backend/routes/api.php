<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeHeroController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TrustedByController;
use App\Http\Controllers\WhoWeAreController;

// Home Heroes Routes
Route::get('/home-heroes', [HomeHeroController::class, 'index']);

// Services Routes
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/services/{slug}', [ServicesController::class, 'show']);

// Trusted By Routes
Route::get('/trusted-by', [TrustedByController::class, 'index']);

// Who We Are Routes
Route::get('/who-we-are', [WhoWeAreController::class, 'index']);