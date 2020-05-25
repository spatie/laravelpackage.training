<?php

use App\Http\Front\Controllers\GitHubWebhookController;
use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\PaddleWebhooksController;
use App\Http\Front\Controllers\SubscribeToEmailListController;
use App\Http\Front\Controllers\UnderConstructionController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::demoAccess('/demo');

/** Needed to avoid error mails from Paddle */
Route::any('/paddle-webhooks', PaddleWebhooksController::class);

Route::post('webhook/github', GitHubWebhookController::class);

Route::middleware('demoMode')->group(function () {
    Route::get('/', HomeController::class);
    Route::post('subscribe', SubscribeToEmailListController::class)->middleware(ProtectAgainstSpam::class);

    Route::view('terms-of-use', 'front.legal.terms-of-use')->name('termsOfUse');
    Route::view('privacy', 'front.legal.privacy')->name('privacy');
});

Route::get('under-construction', UnderConstructionController::class);
