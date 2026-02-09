<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TokenOptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Token options CRUD (admin)
Route::resource('token-options', TokenOptionController::class);

// Bookings CRUD
Route::resource('bookings', BookingController::class);
Route::get('bookings/{booking}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
