<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('tasks', TaskController::class)
    ->middleware('auth')
    ->only(['index', 'store', 'update']);

Route::put('/tasks/{task}/complete', [TaskController::class, 'complete'])
    ->middleware('auth')
    ->name('tasks.complete');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])
    ->middleware('auth')
    ->name('tasks.edit');

require __DIR__.'/auth.php';
