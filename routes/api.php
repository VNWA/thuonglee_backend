<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\AppearanceController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Frontend\ClientController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['ok' => true, 'message' => 'Welcome to the API'];
});

Route::prefix('api/v1')->group(function () {
    Route::get('login/{provider}/redirect', [AuthController::class, 'redirect'])->name('login.provider.redirect');
    Route::get('login/{provider}/callback', [AuthController::class, 'callback'])->name('login.provider.callback');
    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:login')->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('forgot-password', [AuthController::class, 'sendResetPasswordLink'])->middleware('throttle:5,1')->name('password.email');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.store');
    Route::post('verification-notification', [AuthController::class, 'verificationNotification'])->middleware('throttle:verification-notification')->name('verification.send');
    Route::get('verify-email/{ulid}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');


    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('devices/disconnect', [AuthController::class, 'deviceDisconnect'])->name('devices.disconnect');
        Route::get('devices', [AuthController::class, 'devices'])->name('devices');
        Route::get('user', [AuthController::class, 'user'])->name('user');

        Route::post('account/update', [AccountController::class, 'update'])->name('account.update');
        Route::post('account/password', [AccountController::class, 'password'])->name('account.password');

        Route::middleware(['throttle:uploads'])->group(function () {
            Route::post('upload', [UploadController::class, 'image'])->name('upload.image');
        });
        Route::prefix('vnwa')->group(function () {
            Route::prefix('media')->group(function () {
                Route::get('load-data', [MediaController::class, 'loadData']);
                Route::post('create-dir', [MediaController::class, 'createDirectory']);
                Route::post('upload-files', [MediaController::class, 'uploadFiles']);
                Route::post('delete', [MediaController::class, 'delete']);
                Route::post('rename', [MediaController::class, 'rename']);
            });

            Route::prefix('appearance')->group(function () {
                Route::prefix('logo')->group(function () {
                    Route::get('load-data', [AppearanceController::class, 'logoLoadData']);
                    Route::post('update', [AppearanceController::class, 'logoUpdate']);

                });

                Route::prefix('profile')->group(function () {
                    Route::get('load-data', [AppearanceController::class, 'profileLoadData']);
                    Route::post('update', [AppearanceController::class, 'profileUpdate']);

                });

                Route::prefix('home-page')->group(function () {
                    Route::get('load-data', [AppearanceController::class, 'homePageLoadData']);
                    Route::post('update', [AppearanceController::class, 'homePageUpdate']);

                });
                Route::prefix('gallery-page')->group(function () {
                    Route::get('load-data', [AppearanceController::class, 'galleryPageLoadData']);
                    Route::post('update', [AppearanceController::class, 'galleryPageUpdate']);

                });
                Route::prefix('services-page')->group(function () {
                    Route::get('load-data', [AppearanceController::class, 'servicesPageLoadData']);
                    Route::post('update', [AppearanceController::class, 'servicesPageUpdate']);

                });

                Route::prefix('courses-page')->group(function () {
                    Route::get('load-data', [AppearanceController::class, 'coursesPageLoadData']);
                    Route::post('update', [AppearanceController::class, 'coursesPageUpdate']);

                });

                Route::prefix('about-page')->group(function () {
                    Route::get('load-data', [AppearanceController::class, 'aboutPageLoadData']);
                    Route::post('update', [AppearanceController::class, 'aboutPageUpdate']);

                });


            });
            Route::prefix('contact')->group(function () {
                Route::get('load-data', [ContactController::class, 'loadData']);
                Route::get('view/{id}', [ContactController::class, 'view']);
                Route::post('delete', [ContactController::class, 'delete']);
            });

        });


    });

    Route::get('load-data-layout', [ClientController::class, 'loadDataLayout']);
    Route::get('load-data-home-page', [ClientController::class, 'loadDataHomePage']);
    Route::get('load-data-gallery-page', [ClientController::class, 'loadDataGalleryPage']);
    Route::get('load-data-services-page', [ClientController::class, 'loadDataServicesPage']);
    Route::get('load-data-courses-page', [ClientController::class, 'loadDataCoursesPage']);
    Route::get('load-data-about-page', [ClientController::class, 'loadDataAboutPage']);
    Route::post('send-contact', [ClientController::class, 'sendContact'])
        ->middleware('throttle:3,1');
});