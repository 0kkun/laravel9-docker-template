<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\V1\SampleApiController;
use App\Http\Controllers\Apis\V1\LoginController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('/users', function() { return User::all(); });
        Route::get('/samples', [SampleApiController::class, 'index']);
    });
});

// Route::middleware('auth:sanctum')->get('v1/users', function () {
//     return User::all();
// });

// Route::get('v1/users', function () {
//     return User::all();
// });

