<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\LeaveController;
use App\Http\Controllers\Backend\Logo\LogoController;
use App\Http\Controllers\Web\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


// Verified Controller ____________________________________________________________
Route::put('/users-account-status/{id}', [AdminController::class, 'accoutStatus'])->name('accoutStatus');


//  Resource Controller _______________________________________________________
Route::resource('/logo-details', LogoController::class);
Route::resource('/leaves', LeaveController::class);
Route::resource('/users', AdminController::class);

// Backend Controller _______________________________________________________
Route::controller(BackendController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard');
    Route::get('/logo', 'logo')->name('logo');
});
