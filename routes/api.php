<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShortUrlController;

// Create short URL
Route::post('/shorten', [ShortUrlController::class, 'store']);

// List all
Route::get('/urls', [ShortUrlController::class, 'index']);

// Stats
Route::get('/stats/{code}', [ShortUrlController::class, 'stats']);