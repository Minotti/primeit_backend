<?php

use App\Modules\Schedule\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [ScheduleController::class, 'index'])->name('index');
    Route::post('/', [ScheduleController::class, 'store'])->middleware('hasRole:ATTENDANT,RECEPTIONIST')->name('store');
    Route::get('/{id}', [ScheduleController::class, 'show'])->name('show');
    Route::put('/{id}', [ScheduleController::class, 'update'])->middleware('hasRole:RECEPTIONIST,DOCTOR')->name('update');
    Route::delete('/{id}', [ScheduleController::class, 'destroy'])->middleware('hasRole:RECEPTIONIST')->name('destroy');
});
