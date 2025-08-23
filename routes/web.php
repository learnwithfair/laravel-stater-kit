<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\AuthController;
use Illuminate\Support\Facades\Route;


// User Controller _______________________________________________________
Route::controller(AuthController::class)->group(function () {
    Route::get('/client/register', 'showRegisterForm')->name('clientRegister');
    Route::post('/client/register', 'register')->name('clientRegister.store');
    Route::get('/client-signin', 'clientSignin')->name('clientSignin');
    Route::post('/client-signin', 'clientLogin')->name('clientLogin.store');
    Route::post('/client/logout', 'clientLogout')->name('clientLogout');
});

// Customer Dashboard _______________________________________________________
Route::middleware('auth:client')->group(function () {
    Route::get('/client/dashboard', [AuthController::class, 'index'])->name('client.dashboard');
});



require __DIR__ . '/auth.php';
