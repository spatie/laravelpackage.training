<?php

use App\Http\Auth\Controllers\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::permanentRedirect('register', 'https://spatie.be/register')->name('register');
