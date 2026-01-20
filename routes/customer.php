<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\ContactController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\SearchController;
use App\Http\Controllers\Customer\ShowController;
use App\Http\Controllers\Customer\FormController;

Route::prefix('conexion')->middleware('auth')->group(function () {

    Route::prefix('customer')->name('customer.')->group(function () {

        Route::controller(CustomerController::class)->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('{dpi}/edit', 'edit')->name('edit');
            Route::put('{dpi}/update', 'update')->name('update');
            Route::delete('{dpi}/destroy', 'destroy')->name('destroy');
        });

        Route::controller(SearchController::class)->group(function () {
            Route::get('search', 'index')->name('search');
            Route::post('search', 'search')->name('search.result');
        });

        Route::controller(ContactController::class)->group(function () {
            Route::post('contact/{dpi}/store', 'store')->name('createContact');
            Route::delete('contact/{contact}/update', 'destroy')->name('destroyContact');
        });

        Route::controller(FormController::class)->group(function () {
            Route::get('service/create/{dpi}', 'index')->name('service.create');
            Route::post('service/create/form', 'loadForm')->name('service.loadForm');
        });

        Route::get('{dpi}', [ShowController::class, 'show'])->name('show');
    });
});
