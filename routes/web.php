<?php

use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

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

        Route::get('/', function () {
            return Inertia::render('Index');
        })->name('index');

        Route::get('/users', function (Request $request) {
            $users = User::query()
                ->select('id', 'name', 'email')
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->paginate(8)
                ->withQueryString();
            return Inertia::render('Users', [
                'users' => $users,
                'filters' => $request->all('search'),
            ]);

        })->name('users');

        Route::get('/users/create', function () {
            return Inertia::render('Create');
        })->name('users.create');

        Route::post('/users', function (Request $request) {
            sleep(3);
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
            ]);
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => 'password',
            ]);
            return to_route('users');
        })->name('users.store');

        Route::get('/users/{user}/edit', function (User $user) {
            return Inertia::render('Edit', [
                'user' => $user->only('id', 'name', 'email'),
            ]);
        })->name('users.edit');

        Route::patch('/users/{user}/edit', function (Request $request, User $user){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);

            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
            return to_route('users');
        })->name('users.update');

        Route::delete('/users/{user}', function (User $user) {
            $user->delete();
            return to_route('users');
        })->name('users.destroy');

    });
