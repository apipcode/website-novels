<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/browse', [NovelController::class, 'index'])->name('browse');
Route::get('/novel/{slug}', [NovelController::class, 'show'])->name('novel.show');
Route::get('/novel/{slug}/read/{chapter}', [NovelController::class, 'read'])->name('novel.read');

// Dashboard & Author Studio (no auth middleware for prototype)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/studio', [AuthorController::class, 'index'])->name('studio');

// Keep existing auth routes for Breeze compatibility
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
