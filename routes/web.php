<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RoleController;

//No Auth Routes
Route::get('/', [DashboardController::class, 'index']);

//Auth Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/lessons', LessonController::class);
        Route::resource('/roles', RoleController::class);
    });
