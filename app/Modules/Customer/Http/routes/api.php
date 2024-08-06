<?php

use App\Modules\Customer\Http\Controllers\CustomerController;
use App\Modules\Customer\Http\Controllers\CustomerAnimalController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::post('/', [CustomerController::class, 'store'])->name('store');
    Route::get('/{id}', [CustomerController::class, 'show'])->name('show');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('update');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('destroy');

    Route::group(['prefix' => '{customerId}/animals', 'name' => 'animals'], function () {
        Route::get('/', [CustomerAnimalController::class, 'index'])->name('index');
        Route::post('/', [CustomerAnimalController::class, 'store'])->name('store');
        Route::get('/{id}', [CustomerAnimalController::class, 'show'])->name('show');
        Route::put('/{id}', [CustomerAnimalController::class, 'update'])->name('update');
        Route::delete('/{id}', [CustomerAnimalController::class, 'destroy'])->name('destroy');
    });
});
