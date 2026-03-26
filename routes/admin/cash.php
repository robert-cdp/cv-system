<?php

use App\Http\Controllers\Cash\CashRegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('cash')->group(function () {
    Route::get('/', [CashRegisterController::class, 'index'])->name('cash.index');
    Route::get('open', [CashRegisterController::class, 'openForm'])->name('cash.open.form');
    Route::post('open', [CashRegisterController::class, 'open'])->name('cash.open');
    Route::post('close', [CashRegisterController::class, 'close'])->name('cash.close');


    Route::get('income', [CashRegisterController::class, 'incomeForm'])->name('cash.income.form');
    Route::post('income', [CashRegisterController::class, 'income'])->name('cash.income');

    Route::get('expense', [CashRegisterController::class, 'expenseForm'])->name('cash.expense.form');
    Route::post('expense', [CashRegisterController::class, 'expense'])->name('cash.expense');

    Route::get('/{cashRegister}', [CashRegisterController::class, 'show'])->name('cash.show');
});
