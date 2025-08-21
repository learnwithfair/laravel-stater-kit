<?php

use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\ResetController;
use App\Http\Controllers\Web\Frontend\PageController;
use Illuminate\Support\Facades\Route;

//! Route for Reset Database and Optimize Clear
Route::get('/reset', [ResetController::class, 'RunMigrations'])->name('reset');
Route::get('/composer', [ResetController::class, 'composer'])->name('composer');
Route::get('/migrate', [ResetController::class, 'migrate'])->name('migrate');
Route::get('/storage', [ResetController::class, 'storage'])->name('storage');

//! Route for Landing Page
Route::get('/', [HomeController::class, 'index'])->name('welcome');

//Dynamic Page
Route::get('/page/privacy-and-policy', [PageController::class, 'privacyAndPolicy'])->name('dynamicPage.privacyAndPolicy');
