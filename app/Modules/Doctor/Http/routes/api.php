<?php

use App\Modules\Doctor\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [DoctorController::class, 'index'])->name('index');
});
