<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;

Auth::routes(['verify' => true]);

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('profile', ProfileController::class)->only(['show', 'create', 'store', 'edit', 'update', 'destroy']);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('download_cv', [AboutController::class, 'downloadCV'])->name('cv.download');
