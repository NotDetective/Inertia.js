<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateOrStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->select('id', 'name', 'email')
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();
        return Inertia::render('Users', [
            'users' => $users,
            'filters' => $request->all('search'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Create');
    }

    public function store(UserUpdateOrStoreRequest $request)
    {
        // Simulate a slow request
        sleep(3);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => 'password',
        ]);
        return to_route('users');
    }

    public function edit(User $user)
    {
        return Inertia::render('Edit', [
            'user' => $user->only('id', 'name', 'email'),
        ]);
    }

    public function update(UserUpdateOrStoreRequest $request, User $user)
    {
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        return to_route('users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users');
    }

}
