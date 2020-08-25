<?php

use Illuminate\Support\Facades\Route;

Route::middleware('canAccessVideos')->group(function () {
    Route::permanentRedirect('video-course', 'https://spatie.be/login')->name('video-course');
    Route::permanentRedirect('video-course/{chapter}/{video}', 'https://spatie.be/login')->name('video-course.show');
});

Route::permanentRedirect('account', 'https://spatie.be/login')->name('account');
Route::permanentRedirect('password', 'https://spatie.be/login')->name('password');
