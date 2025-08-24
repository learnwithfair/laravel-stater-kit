<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\LeaveController;
use Illuminate\Support\Facades\Route;


// |--------------------------------------------------------------------------
// |                                Backend Route
// |--------------------------------------------------------------------------


// Verified Controller ____________________________________________________________
// Route::put('/users-account-status/{id}', [AdminController::class, 'accoutStatus'])->name('accoutStatus');


//  Resource Controller _______________________________________________________
Route::resource('/leaves', LeaveController::class);
Route::resource('/users', AdminController::class);

// keep your existing resource route
Route::resource('/users', AdminController::class);


// NEW: split “role” & “account status” updates into explicit routes
Route::patch('/users/{user}/role', [AdminController::class, 'updateRole'])->name('users.role');
Route::patch('/users/{user}/account-status', [AdminController::class, 'updateAccountStatus'])->name('users.account-status');


// Backend Controller _______________________________________________________
Route::controller(BackendController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard');
});
