<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\Settings\DynamicPageController;
use App\Http\Controllers\Web\Backend\Settings\MailSettingController;
use App\Http\Controllers\Web\Backend\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Settings\SocialMediaController;
use App\Http\Controllers\Web\Backend\Settings\SystemSettingController;


// |--------------------------------------------------------------------------
// |                                Admin Setting route for dashboard
// |--------------------------------------------------------------------------


//! This route is for updating the user's profile_______________________________________________________
Route::controller(ProfileController::class)->group(function () {
    Route::post('/update-profile-picture', 'UpdateProfilePicture')->name('update.profile.picture');
    Route::post('/update-profile-password', 'UpdatePassword')->name('update.Password');

    //! Route for ProfileController_______________________________________________________
    Route::get('/profile', 'showProfile')->name('profile.setting');
    Route::post('/update-profile', 'UpdateProfile')->name('update.profile');
});

//! Route for SystemSettingController_______________________________________________________
Route::controller(SystemSettingController::class)->group(function () {
    Route::get('/system-setting', 'index')->name('system.index');
    Route::post('/system-setting', 'update')->name('system.update');
});

//! Route for MailSettingController_______________________________________________________
Route::controller(MailSettingController::class)->group(function () {
    Route::get('/mail-setting', 'index')->name('mail.setting');
    Route::post('/mail-setting', 'update')->name('mail.update');
});

//! Route for SocialMediaController_______________________________________________________
Route::controller(SocialMediaController::class)->group(function () {
    Route::get('/social-media', 'index')->name('social.index');
    Route::post('/social-media', 'update')->name('social.update');
    Route::delete('/social-media/{id}', 'destroy')->name('social.delete');
});

Route::controller(DynamicPageController::class)->group(function () {
    Route::get('/dynamic-page', 'index')->name('dynamic_page.index');
    Route::get('/dynamic-page/create', 'create')->name('dynamic_page.create');
    Route::post('/dynamic-page', 'store')->name('dynamic_page.store');
    Route::get('/dynamic-page/{id}/edit', 'edit')->name('dynamic_page.edit');
    Route::patch('/dynamic-page/{id}', 'update')->name('dynamic_page.update');
    Route::patch('/dynamic-page/{id}/status', 'status')->name('dynamic_page.status');
    Route::get('/dynamic-page/{id}', 'show')->name('dynamic_page.show');
    Route::delete('/dynamic-page/{id}', 'destroy')->name('dynamic_page.destroy');
});



