<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificateController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/project/{id}', [DashboardController::class, 'show'])->name('project.show');
Route::get('/dashboard', [DashboardController::class, 'index']);

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes untuk admin yang harus login
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    // Sertifikat
    Route::get('/sertifikat', [CertificateController::class, 'index'])->name('admin.sertifikat');
    Route::post('/sertifikat', [CertificateController::class, 'store'])->name('certificates.store');
    Route::delete('/sertifikat/{certificate}', [CertificateController::class, 'destroy'])->name('certificates.destroy');

    Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    // Projek
    Route::get('/projek', [ProjectController::class, 'index'])->name('admin.projek');
    Route::post('/projek', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projek/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projek/{id}', [ProjectController::class, 'update'])->name('projects.update');  
    Route::delete('/projek/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
   


    // Sertifikat
    Route::get('/sertifikat', [CertificateController::class, 'index'])->name('admin.sertifikat');
    Route::post('/sertifikat', [CertificateController::class, 'store'])->name('certificates.store');
    Route::delete('/sertifikat/{certificate}', [CertificateController::class, 'destroy'])->name('certificates.destroy');
});


});


