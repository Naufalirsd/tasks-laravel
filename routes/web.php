<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes (from auth.php)
require __DIR__ . '/auth.php';

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Task Routes
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// routes/web.php


Route::middleware(['auth'])->group(function () {
    // Named routes for TaskController
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
 
});
// Pastikan ada ini di routes/web.php
// use App\Http\Controllers\TaskController;

Route::middleware('auth')->group(function () {
    // ... route lainnya
    
    // Tambahkan route untuk toggle
    Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleComplete'])
        ->name('tasks.toggle'); // Ini yang memberikan nama route
});