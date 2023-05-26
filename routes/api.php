<?php

use App\Http\Controllers\Auth\PasswordForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Me\MeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/me', [MeController::class, 'show']);
});

Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class);
Route::post('register', RegisterController::class);
Route::post('verify-email', VerifyEmailController::class);
Route::post('forgot-password', PasswordForgotController::class);
Route::post('reset-password', PasswordResetController::class);
