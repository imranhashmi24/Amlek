<?php

use App\Http\Controllers\User\AuthorizationController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PropertyController;
use App\Http\Controllers\User\ServiceRequestController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::get('register', 'showRegistrationForm')->name('register');
        Route::post('register', 'store');
        Route::post('check-mail', 'checkUser')->name('checkUser');
    });

    Route::controller(ForgotPasswordController::class)->prefix('password')->name('password.')->group(function () {
        Route::get('reset', 'showLinkRequestForm')->name('request');
        Route::post('email', 'sendResetCodeEmail')->name('email');
        Route::get('code-verify', 'codeVerify')->name('code.verify');
        Route::post('verify-code', 'verifyCode')->name('verify.code');
    });

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::post('password/reset', 'reset')->name('password.update');
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    });

});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'create')->name('login');
    Route::post('login', 'store');
    Route::get('logout', 'destroy')->name('logout')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::controller(AuthorizationController::class)->group(function () {
        Route::get('authorization', 'authorizeForm')->name('authorization');
        Route::get('resend-verify/{type}', 'sendVerifyCode')->name('send.verify.code');
        Route::post('verify-email', 'emailVerification')->name('verify.email');
        Route::post('verify-mobile', 'mobileVerification')->name('verify.mobile');
    });

});

Route::middleware(['check.status'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('user-data', 'userData')->name('data');
        Route::post('user-data-submit', 'userDataSubmit')->name('data.submit');
    });

    Route::middleware('registration.complete')->group(function () {
        Route::controller(UserController::class)->group(function () {

            Route::get('dashboard', 'home')->name('home');
        });

        //Profile setting
        Route::controller(ProfileController::class)->group(function () {
            Route::get('profile-setting', 'profile')->name('profile.setting');
            Route::post('profile-setting', 'submitProfile');
            Route::get('change-password', 'changePassword')->name('change.password');
            Route::post('change-password', 'submitPassword');
        });

        // property route
        Route::group(['prefix' => 'properties', 'as' => 'properties.'], function () {
            Route::get('/', [PropertyController::class, 'index'])->name('index');
            Route::get('/pending', [PropertyController::class, 'pending'])->name('pending');
            Route::get('/published', [PropertyController::class, 'published'])->name('published');
            Route::get('/review', [PropertyController::class, 'review'])->name('review');
            Route::get('/rejected', [PropertyController::class, 'rejected'])->name('rejected');
            Route::get('/create', [PropertyController::class, 'create'])->name('create');
            Route::post('/store', [PropertyController::class, 'store'])->name('store');
            Route::post('/update/{id}', [PropertyController::class, 'update'])->name('update');
            Route::get('/edit/{id}', [PropertyController::class, 'edit'])->name('edit');
            Route::get('/show/{id}', [PropertyController::class, 'show'])->name('show');
        });

        //Service Request
        Route::get('/property-request', [ServiceRequestController::class, 'propertyRequest'])->name('property.request');
        Route::get('/property-request/{id}', [ServiceRequestController::class, 'propertyRequestDetails'])->name('property.request.details');

        Route::get('/finance-request', [ServiceRequestController::class, 'financeRequest'])->name('finance.request');
        Route::get('/finance-request/{id}', [ServiceRequestController::class, 'financeRequestDetails'])->name('finance.request.details');

        Route::get('/marketing-request', [ServiceRequestController::class, 'marketingRequest'])->name('marketing.request');
        Route::get('/marketing-request/{id}', [ServiceRequestController::class, 'marketingRequestDetails'])->name('marketing.request.details');

        Route::get('/service-request', [ServiceRequestController::class, 'serviceRequest'])->name('service.request');
        Route::get('/service-request/{id}', [ServiceRequestController::class, 'serviceRequestDetails'])->name('service.request.details');


        Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorite.index');
        Route::post('/favorite-remove/{id}', [FavoriteController::class, 'remove'])->name('favorite.remove');
    });
});
