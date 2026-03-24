<?php

use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('product/categories', CategoryController::class)->names('product.categories');

Route::resource('product', ProductController::class);