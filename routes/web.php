<?php

// routes/web.php
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('basecode');
});

Route::get('/health', [\App\Http\Controllers\HealthController::class, 'check']);

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
});
