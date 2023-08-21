<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\AboutController;
use App\Http\Controllers\API\SkillTechnologyController;
use App\Http\Controllers\API\ExperienceController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\ProjectTagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::get('/', [HomeController::class, 'index'])->name('home'); */

Route::get('profile', ProfileController::class);
Route::get('about', AboutController::class);
Route::get('skills', SkillTechnologyController::class);
Route::get('experiences', ExperienceController::class);
Route::get('projects', ProjectController::class);
Route::get('tags', TagController::class);
Route::get('/project-tags', ProjectTagController::class);
