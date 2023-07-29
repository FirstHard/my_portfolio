<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Auth::routes(['verify' => true]);

// Оборачиваем все маршруты в префикс /admin
Route::prefix('admin')->group(function () {

    // Маршрут для домашней страницы пользователя (после входа в систему)
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
});

// Маршрут для домашней страницы пользователя (после входа в систему)
Route::get('/', [HomeController::class, 'index'])->name('home');
