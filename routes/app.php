<?php

use App\Http\App\Controllers\Account\AccountController;
use App\Http\App\Controllers\Account\GithubController;
use App\Http\App\Controllers\Account\PasswordController;
use App\Http\App\Controllers\AfterPaddleSaleController;
use App\Http\App\Controllers\Licenses\BuyVideoCourseController;
use App\Http\App\Controllers\Licenses\UpdateLicenseController;
use App\Http\App\Controllers\PurchasesIndexController;
use App\Http\App\Controllers\ReleasesController;
use App\Http\App\Controllers\Videos\VideoCompletionController;
use App\Http\App\Controllers\Videos\VideosController;

Route::get('licenses', BuyVideoCourseController::class)->name('licenses');
Route::get('purchases', PurchasesIndexController::class)->name('purchases');

Route::get('after-paddle-sale', AfterPaddleSaleController::class);

Route::middleware('canAccessVideos')->group(function () {
    Route::get('video-course', [VideosController::class, 'index'])->name('video-course');
    Route::get('video-course/{chapter}/{video}', [VideosController::class, 'show'])->name('video-course.show');
    Route::post('video-course/{video}/complete', [VideoCompletionController::class, 'store']);
    Route::delete('video-course/{video}/complete', [VideoCompletionController::class, 'destroy']);
});

Route::get('account', [AccountController::class, 'index'])->name('account');
Route::put('account', [AccountController::class, 'update']);
Route::get('password', [PasswordController::class, 'index'])->name('password');
Route::put('password', [PasswordController::class, 'update']);

Route::get('github', [GithubController::class, 'show'])->name('github');
Route::get('github/redirect', [GithubController::class, 'redirectTo'])->name('github.redirect');
Route::get('github/callback', [GithubController::class, 'handleCallback'])->name('github.callback');
Route::delete('github/disconnect', [GithubController::class, 'disconnect'])->name('github.disconnect');
