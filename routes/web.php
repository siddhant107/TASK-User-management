<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;




// Route to show login form
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
// Route to handle login submission
Route::post('/', [LoginController::class, 'login'])->name('login');

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes that require authentication
Route::middleware('auth')->group(function () {
    // Tasks related routes
    // Route::get('/form', [HomeController::class, 'form'])->name('tasks.form');
    // Route::post('/tasks', [TaskController::class, 'store']);
    // Route::get('/tasks/view', [TaskController::class, 'view'])->name('tasks.view');
    // Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    // Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
    // Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
    // Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    // Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    // Route::get('/tasks/{id}/view', [TaskController::class, 'show'])->name('tasks.show');

    Route::resource('/tasks', TaskController::class); //resource route
    Route::get('/task/view/{id}', [TaskController::class, 'viewDetails'])->name('task.view');

    // User related routes
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Route to view a specific task