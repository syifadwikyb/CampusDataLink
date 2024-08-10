<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomizationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangePassController;

// Landing page or customization view
Route::get('/', function () {
    return view('landingpage');
});

// Route untuk mengupdate customization termasuk slug
Route::post('/customization/update', [CustomizationController::class, 'update'])->name('customization.update');

// Route untuk halaman customization home
Route::get('/customization/home', [HomeController::class, 'index'])->name('customization.home');

// Register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

//Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Home route, protected by auth middleware
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Grouped routes with auth middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/customization/edit', [CustomizationController::class, 'edit'])->name('customization.edit');
    Route::post('/customization/update', [CustomizationController::class, 'update'])->name('customization.update');
});

// Change Password
Route::get('/changepass', [ChangePassController::class, 'changepass'])->name('changepass');
Route::post('/changepass-proses', [ChangePassController::class, 'changepass_proses'])->name('changepass-proses');

// Route untuk menampilkan konten berdasarkan slug
Route::get('/{slug}', [CustomizationController::class, 'showContentBySlug'])->name('customization.showContentBySlug');
