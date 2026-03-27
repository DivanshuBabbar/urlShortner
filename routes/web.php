<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

Route::get('/', function () {
    return view('welcome');
});

// Redirect
Route::get('/{code}', [ShortUrlController::class, 'redirect']);
