<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [EventController::class , 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/dashboard' , [EventController::class , 'Add'])->name('event.add');
Route::delete('/dashboard/{id}' , [EventController::class , 'delete'])->name('event.destroy');
Route::get('/edit/{id}' , [EventController::class , 'edit'])->name('event.edit');
Route::put('/edit');

require __DIR__.'/auth.php';
