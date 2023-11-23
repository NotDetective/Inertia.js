<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//login
//login is a basic auth
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth'])
    ->group(function () {

        Route::get('/', [Controller::class, 'indexPage'])
            ->name('index');

        // Users
        // the routes work the same as the normal laravel routes

        // Returns a list of users with pagination and a search option
        Route::get('/users', [UserController::class, 'index'])
            ->name('users');
        // Returns a form to create a new user via Inertia
        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');
        // Stores a new user simple laravel
        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');
        // Returns a form to edit a user via Inertia
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])
            ->name('users.edit');
        // Updates a user simple laravel
        Route::patch('/users/{user}/edit', [UserController::class, 'update'])
            ->name('users.update');
        // Deletes a user simple laravel
        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

    });
