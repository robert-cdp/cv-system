<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('user', UserController::class);

Route::resource('roles', RoleController::class);
