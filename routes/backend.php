<?php

use App\Http\Controllers\Web\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Web\Backend\User\UserController;
use Illuminate\Support\Facades\Route;

//  Users Controller _________________________________________________________________
Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
    Route::resource('/', UserController::class);
    Route::patch('{user}/role', 'updateRole')->name('role');
    Route::patch('{user}/account-status', 'updateAccountStatus')->name('account-status');
});

// Dashboard Controller _______________________________________________________
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard');
});
