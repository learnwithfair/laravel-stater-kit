<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Users Auth --------------------------------------------------------------------------
Route::controller(AuthController::class)->group(function () {
    Route::post('/register',  'register');
    Route::post('/login',     'login');
    Route::post('/resend-otp',  'resendOtp');
    Route::post('/verify-otp',  'verifyRegisterOtp');
    Route::post('/forgot-password',  'forgotPassword');
    Route::post('/reset-password',  'resetPassword');
});


// Users Controller --------------------------------------------------------------------------
Route::middleware('auth:sanctum')->controller(AuthController::class)->group(function () {
    Route::get('/users',  'index');
    Route::get('/users/{user}',  'show');
    Route::delete('/users',  'destroy');
    Route::post('/change-password',  'changePassword');
    Route::post('/update-profile',  'updateProfile');

    Route::get('/me',         'me');
    Route::post('/logout',    'logout');
    Route::post('/logout-all',  'logoutAll');
});
