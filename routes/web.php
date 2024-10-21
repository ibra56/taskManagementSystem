<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;





Route::get('/', function () {
    return view('welcome');
});

// index task 
Route::middleware('auth')->group(function () {
    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    Route::post('/task/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/task/delete/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

});


Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

require __DIR__.'/auth.php';
