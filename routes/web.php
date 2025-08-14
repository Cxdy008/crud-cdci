<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', \App\Http\Controllers\UserController::class);

// Adicione isso logo abaixo:
Route::delete('users/{user}/purge', [\App\Http\Controllers\UserController::class, 'purge'])->name('users.purge');

Route::resource('tasks', \App\Http\Controllers\TaskController::class);

Route::post('/users/{user}/tasks', [TaskController::class, 'store'])->name('tasks.store');
