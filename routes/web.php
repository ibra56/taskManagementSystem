<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use App\Models\Task;





Route::get('/', function () {
    return view('welcome');
});

// index task 
Route::middleware('auth')->group(function () {
    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/show/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/task/edit/{task}', [TaskController::class, 'edit'])
    ->name('tasks.edit')
    ->can('edit', 'task');
    Route::delete('/task/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy')->can('delete', 'task');
    Route::patch('/task/update/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/task/store', [TaskController::class, 'store'])->name('tasks.store');
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
