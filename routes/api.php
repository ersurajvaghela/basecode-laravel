<?php
// routes/api.php
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Public routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    
    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        
        // User routes
        Route::apiResource('users', UserController::class);
        Route::patch('/users/{id}/activate', [UserController::class, 'activate']);
        Route::patch('/users/{id}/deactivate', [UserController::class, 'deactivate']);
        
        // Post routes
        Route::apiResource('posts', PostController::class);
        Route::patch('/posts/{id}/publish', [PostController::class, 'publish']);
        Route::patch('/posts/{id}/unpublish', [PostController::class, 'unpublish']);
    });
});