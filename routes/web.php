<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Auth::routes(['verify' => true]);

// Оборачиваем все маршруты в префикс /admin
Route::prefix('admin')->group(function () {

});

Route::get('/', function () {
    return view('welcome');
});

// Маршрут для домашней страницы пользователя (после входа в систему)
Route::get('/home', [HomeController::class, 'index'])->name('home');
