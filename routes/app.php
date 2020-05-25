<?php

use App\Http\App\Controllers\Account\AccountController;
use App\Http\App\Controllers\Account\PasswordController;
use App\Http\App\Controllers\BuyVideoCourseController;
use App\Http\App\Controllers\VerifyPaddleSaleController;
use App\Http\App\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

Route::get('buy-course', BuyVideoCourseController::class)->name('buy');

Route::get('verify-sale/{paddleCheckoutId}', VerifyPaddleSaleController::class)->name('verify-sale');

Route::middleware('canAccessVideos')->group(function () {
    Route::get('video-course', [VideosController::class, 'index'])->name('video-course');
    Route::get('video-course/{chapter}/{video}', [VideosController::class, 'show'])->name('video-course.show');
});

Route::get('account', [AccountController::class, 'index'])->name('account');
Route::put('account', [AccountController::class, 'update']);
Route::get('password', [PasswordController::class, 'index'])->name('password');
Route::put('password', [PasswordController::class, 'update']);
