<?php

use App\Http\Controllers\LoginController;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'create'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth'])
    ->group(function () {



        Route::get('/', function () {
            return Inertia::render('Index', [
                'users' => User::select('id', 'name')->get(),
            ]) ;
        })->name('index');

    });
