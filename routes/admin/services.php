<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Service\ServiceCategoryController;
use App\Http\Controllers\Service\ServiceController;

Route::resource('services.categories', ServiceCategoryController::class);

Route::resource('services', ServiceController::class);