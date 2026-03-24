<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tramite\TramiteController;

Route::prefix('tramites')->name('tramite.')->controller()->group(function () {
    Route::controller(TramiteController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('store/{dpi}', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::put('update/{id}', 'update')->name('update');
        Route::get('print/{dpi}', 'print')->name('print');
    });
});
