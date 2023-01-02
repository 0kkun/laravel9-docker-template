<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\V1\SampleApiController;
use App\Http\Controllers\Apis\V1\AuthController;
use App\Models\User;

Route::prefix('v1')->group(function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('/users', function() { return User::all(); });
        Route::get('/samples', [SampleApiController::class, 'index']);
    });
});
