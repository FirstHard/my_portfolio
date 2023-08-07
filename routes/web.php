<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillsTechnologyController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;

Auth::routes(['verify' => true]);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('profile', ProfileController::class)->except(['index', 'destroy']);
    Route::resource('about', AboutController::class)->except(['index', 'destroy']);
    Route::resource('skills-technology', SkillsTechnologyController::class);
    Route::resource('experience', ExperienceController::class)->except(['show']);
    Route::resource('projects', ProjectController::class);
    Route::resource('tags', TagController::class);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('download_cv', [AboutController::class, 'downloadCV'])->name('cv.download');
