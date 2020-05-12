<?php

use App\Http\Front\Controllers\DocumentationController;
use App\Http\Front\Controllers\DownloadLatestController;
use App\Http\Front\Controllers\GitHubWebhookController;
use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\IsValidLicenseController;
use App\Http\Front\Controllers\RoadmapController;
use App\Http\Front\Controllers\SubscribeToEmailListController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::webhooks('paddle-webhooks');
Route::post('webhook/github', GitHubWebhookController::class);

Route::get('/', HomeController::class);
Route::post('subscribe', SubscribeToEmailListController::class)->middleware(ProtectAgainstSpam::class);

Route::view('terms-of-use', 'front.legal.terms-of-use')->name('termsOfUse');
Route::view('privacy', 'front.legal.privacy')->name('privacy');
