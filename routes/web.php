<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalorieController;
use App\Http\Controllers\RecommendationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('calorie.home');
// });
Route::get('/', [CalorieController::class, 'showHome'])->name('index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/calorie', [CalorieController::class, 'index'])->name('calorie.index');
Route::post('/calorie/calculate', [CalorieController::class, 'calculateCalories'])->name('calculate');
Route::post('/calorie/result', [CalorieController::class, 'calculateCalories'])->name('calculateresult');
Route::get('/progress-table', [CalorieController::class, 'showEntries'])->name('progress-table');
Route::get('/weekly-progress', [CalorieController::class, 'showWeeklyProgress'])->name('weekly-progress');
Route::get('/recommendation', [RecommendationController::class, 'generateRecommendation'])->name('recommendation');


require __DIR__.'/auth.php';
