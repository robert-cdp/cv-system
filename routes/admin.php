<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Service\ServiceCategoryController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Tramite\TramiteController;
use App\Http\Controllers\User\UserController;

Route::prefix('conexion')->middleware('auth')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('services')->name('services.')->group(function () {
        // Categorías
        Route::prefix('categories')
            ->name('categories.')
            ->controller(ServiceCategoryController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{slug}', 'show')->name('show');
                Route::get('{slug}/edit', 'edit')->name('edit');
                Route::put('{slug}', 'update')->name('update');
                Route::delete('{slug}', 'destroy')->name('destroy');
            });

        // Services en sí
        Route::controller(ServiceController::class)->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('{slug}', 'show')->name('show');
            Route::get('{slug}/edit', 'edit')->name('edit');
            Route::put('{slug}', 'update')->name('update');
            Route::delete('{slug}', 'destroy')->name('destroy');
        });
    });

    Route::prefix('tramites')->name('tramite.')->controller(TramiteController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('store/{dpi}', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('print/{dpi}', 'print')->name('print');
    });

    Route::resource('user', UserController::class);

});
