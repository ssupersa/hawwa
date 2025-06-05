<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MateriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/ustadz/dashboard', [UstadzController::class, 'dashboard'])->name('ustadz.dashboard');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Routes khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/materi', [MateriController::class, 'index'])->name('admin.materi.index');
    Route::post('/admin/materi/{id}/verifikasi', [MateriController::class, 'verifikasi'])->name('admin.materi.verifikasi');

    // Jika ada route materi index admin juga bisa di sini
    Route::get('/admin/materi/index', [MateriController::class, 'index'])->name('admin.materi.index.alt');
});

// Routes khusus Ustadz
// Halaman upload materi dan daftar materi ustadz
Route::middleware(['auth', 'role:ustadz'])->group(function () {
    Route::get('/ustadz/materi', [MateriController::class, 'index'])->name('ustadz.materi.index');
    Route::post('/ustadz/materi', [MateriController::class, 'store'])->name('materi.store');
});



// Routes khusus User
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/materi', [MateriController::class, 'index'])->name('user.materi.index');
});

require __DIR__.'/auth.php';
