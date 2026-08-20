<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Redirect the home page to the login page.
Route::get('/', function () {
    return redirect()->route('login');
});

// Protected routes for authenticated users.
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Keep this route before the resource route.
    Route::get('/alumni/export-pdf', [AlumniController::class, 'exportPdf'])
        ->name('alumni.export_pdf');

    // Alumni CRUD routes.
    Route::resource('alumni', AlumniController::class);
});

// Profile routes.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Custom login and logout routes.
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';