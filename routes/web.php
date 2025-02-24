<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyEventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RspvController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [EventController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/dashboard', [EventController::class, 'Add'])->name('event.add');
    Route::delete('/dashboard/{id}', [EventController::class, 'delete'])->name('event.destroy');
    Route::get('/edit/{id}', [EventController::class, 'editable'])->name('event.edit');
    Route::put('/edit/{id}', [EventController::class, 'edit'])->name('edit.event');
    Route::post('/details/{id}' , [CommentController::class , 'AddComment'])->name('add.comment');
    Route::delete('details/{id}' , [CommentController::class , 'DeleteComment'])->name('Delete.comment');
    Route::post('/details/reserve/{id}' , [RspvController::class , 'Join'])->name('event.reserve');
    Route::get('/events' , [MyEventsController::class , 'index'])->name('my.events');
    Route::delete('/events' , [MyEventsController::class , 'CancelJoin'])->name('cancel.join');
});


Route::get('/details/{id}', [EventController::class, 'showdetails'])->name('event.details');

require __DIR__ . '/auth.php';
