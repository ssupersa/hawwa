<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UstadzController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Role-based Dashboards
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/ustadz/dashboard', [UstadzController::class, 'dashboard'])->name('ustadz.dashboard');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::post('/materi/{id}/verifikasi', [MateriController::class, 'verifikasi'])->name('materi.verifikasi');
});

// Ustadz routes
Route::middleware(['auth', 'role:ustadz'])->prefix('ustadz')->name('ustadz.')->group(function () {
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
});

// User routes
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
});

require __DIR__.'/auth.php';
