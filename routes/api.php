<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// |--------------------------------------------------------------------------
// |                                API Route
// |--------------------------------------------------------------------------


// User Register --------------------------------------------------------------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',        [AuthController::class, 'me']);
    Route::post('/logout',   [AuthController::class, 'logout']);
    Route::post('/logout-all', [AuthController::class, 'logoutAll']);

    // Example protected route(s) go here...
});
