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
        // normal laravel
        $users = User::query()
            ->select('id', 'name', 'email')
            ->with('media')
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        foreach ($users as $user) {
            $user->avatar = $user->getFirstMediaUrl('avatars');
        }

        // Instead of returning a view we let inertia render the page
        // A inertia renders a Vue component with that name
        // A inertia render can also pass data to the Vue component just like a view
        return Inertia::render('Users', [
            'users' => $users,
            'filters' => $request->all('search'),
            'can' => [
                // This is the best way to have authorization in your app
                'create' => true,
                'update' => true,
            ],
        ]);
    }

    public function create()
    {
        // Instead of returning a view we let inertia render the page
        // A inertia renders a Vue component with that name
        return Inertia::render('Create');
    }

    public function store(UserUpdateOrStoreRequest $request)
    {
        // Simulate a slow request
//        sleep(3);

        // normal laravel
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => 'password',
        ]);

        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        // Instead of using a redirect we use to_route()
        // This way the page doest refresh after the request
        return to_route('users');
    }

    public function edit(User $user)
    {
        $user['avatar'] = $user->getFirstMediaUrl('avatars');

        // Instead of returning a view we let inertia render the page
        // A inertia renders a Vue component with that name
        // A inertia render can also pass data to the Vue component just like a view
        return Inertia::render('Edit', [
            'user' => $user,
        ]);
    }

    public function update(UserUpdateOrStoreRequest $request, User $user)
    {
        // normal laravel
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        // Instead of using a redirect we use to_route()
        // This way the page doest refresh after the request
        return to_route('users');
    }

    public function destroy(User $user)
    {
        // normal laravel
        $user->delete();

        // Instead of using a redirect we use to_route()
        return to_route('users');
    }

}
