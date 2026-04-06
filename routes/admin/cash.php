<?php

use App\Http\Controllers\Cash\CashRegisterController;
use App\Http\Controllers\Cash\ExpenseController;
use App\Http\Controllers\Cash\IncomeController;
use App\Http\Controllers\Cash\OpenController;
use Illuminate\Support\Facades\Route;

Route::prefix('cash')->group(function () {
    
    Route::get('/', [CashRegisterController::class, 'index'])->name('cash.index');
    Route::get('open', [OpenController::class, 'openForm'])->name('cash.open.form');
    Route::post('open', [OpenController::class, 'open'])->name('cash.open');
    Route::post('close', [CashRegisterController::class, 'close'])->name('cash.close');


    Route::get('income', [IncomeController::class, 'incomeForm'])->name('cash.income.form');
    Route::post('income', [IncomeController::class, 'income'])->name('cash.income');

    Route::get('expense', [ExpenseController::class, 'expenseForm'])->name('cash.expense.form');
    Route::post('expense', [ExpenseController::class, 'expense'])->name('cash.expense');

    Route::get('/{cashRegister}', [CashRegisterController::class, 'show'])->name('cash.show');
});
