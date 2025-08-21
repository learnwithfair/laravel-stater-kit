<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\LeaveController;
use App\Http\Controllers\Backend\Logo\LogoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|                          Cache Clear Routes
|--------------------------------------------------------------------------
 */

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return "
          events ..... DONE </br>
          views .......DONE </br>
          cache ...... DONE </br>
          route .......DONE </br>
          config ......DONE </br>
          compiled ....DONE </br>
        ";
});
/*
|--------------------------------------------------------------------------
|                           Frontend Routes
|--------------------------------------------------------------------------
 */
// For Display Home Page

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/home', 'index')->name('home');
    Route::get('/services', 'services')->name('services');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/work-for-us', 'workForUs')->name('workForUs');
    Route::get('/client-signin', 'clientSignin')->name('clientSignin');
    // Route::get( '/client-register', 'clientRegister' )->name( 'clientRegister' );

});

Route::controller(AuthController::class)->group(function () {
    // Client Register
    Route::get('/client/register', 'showRegisterForm')->name('clientRegister');
    Route::post('/client/register', 'register')->name('clientRegister.store');

    // Client Sign In
    Route::get('/client-signin', 'clientSignin')->name('clientSignin');
    Route::post('/client-signin', 'clientLogin')->name('clientLogin.store');

    // Client Logout
    Route::post('/client/logout', 'clientLogout')->name('clientLogout');
});

Route::middleware('auth:client')->group(function () {
    Route::get('/client/dashboard', [AuthController::class, 'index'])->name('client.dashboard');
});




// // Backend Controller _______________________________________________________
// Route::middleware( [
//     'auth:sanctum',
//     config( 'jetstream.auth_session' ),
//     'verified',
//     'check.user.enabled',
// ] )->controller( BackendController::class )->prefix( '/admin' )->group( function () {
//     Route::get( '/dashboard', 'index' )->name( 'dashboard' );
//     Route::get( '/logo', 'logo' )->name( 'logo' );
// } );


require __DIR__ . '/auth.php';
