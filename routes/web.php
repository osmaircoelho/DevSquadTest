<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DailyLogController;

Route::view('/', 'tailwind');




Route::post('/daily-logs', [DailyLogController::class, 'store'])->name('daily-logs.store')
    ->middleware('EnsureUserHasRole');

Route::put('/daily-logs/{dailylog}', [DailyLogController::class, 'update'])->name('daily-logs.update');

Route::delete('daily-logs/{dailylog}', [DailyLogController::class, 'destroy'])->name('daily-logs.delete');
