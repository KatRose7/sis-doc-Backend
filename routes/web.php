<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\RoleController;
use Inertia\Inertia;
// No auth Routes
Route::get('/',[DashboardController::class, 'index']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    //Auth Routes
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/documentos', DocumentoController::class);
    Route::resource('/roles', RoleController::class);
});