<?php

use App\Http\Controllers\Web\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Web\Backend\User\UserController;
use Illuminate\Support\Facades\Route;

//  Users Controller _________________________________________________________________
Route::resource('users', UserController::class);
Route::patch('users/{user}/role', [UserController::class, 'updateRole'])->name('users.role');
Route::patch('users/{user}/account-status', [UserController::class, 'updateAccountStatus'])->name('users.account-status');

// Dashboard Controller _______________________________________________________
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard');
});
