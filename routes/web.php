<?php

use App\Http\Front\Controllers\GitHubWebhookController;
use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\PaddleWebhooksController;
use App\Http\Front\Controllers\SubscribeToEmailListController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

/** Needed to avoid error mails from Paddle */
Route::any('/paddle-webhooks', PaddleWebhooksController::class);

Route::permanentRedirect('/mailcoach', 'https://spatie.be/mailcoach');
Route::permanentRedirect('/mailcoach/campaigns', 'https://spatie.be/mailcoach/campaigns');

Route::post('webhook/github', GitHubWebhookController::class);

Route::get('/', HomeController::class);
Route::post('subscribe', SubscribeToEmailListController::class)->middleware(ProtectAgainstSpam::class);

Route::view('terms-of-use', 'front.legal.terms-of-use')->name('termsOfUse');
Route::view('privacy', 'front.legal.privacy')->name('privacy');

Route::redirect('buy', 'https://laravelpackage.training/login')->name('buy');

// Route::permanentRedirect('buy', 'https://spatie.be/products/laravel-package-training')->name('buy');
