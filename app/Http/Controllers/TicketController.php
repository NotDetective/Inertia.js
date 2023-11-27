<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $tickets = Ticket::query()
            ->select('id', 'title', 'user_id', 'project_id', 'status')
            ->when($request->has('search'), function ($query) use ($request) {
                $query->where('title', 'like', "%{$request->input('search')}%");
            })
            ->with(['user' => function ($query) {
                $query->select('id', 'name', 'email');
            }])
            ->when($request->has('searchUser'), function ($query) use ($request) {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('name', 'like', "%{$request->input('searchUser')}%");
                });
            })
            ->when($request->has('selectedUser'), function ($query) use ($request) {
                $data = json_decode($request->input('selectedUser'));

                if ($data === []) {
                    return;
                }

                $query->whereHas('user', function ($query) use ($data) {
                    $query->whereIn('name', $data);
                });
            })

            ->with(['project' => function ($query) {
                $query->select('id', 'name', 'customer');
            }])
            ->when($request->has('searchProject'), function ($query) use ($request) {
                $query->whereHas('project', function ($query) use ($request) {
                    $query->where('name', 'like', "%{$request->input('searchProject')}%");
                });
            })
            ->when($request->has('selectedProject'), function ($query) use ($request) {
                $data = json_decode($request->input('selectedProject'));

                if ($data === []) {
                    return;
                }

                $query->whereHas('project', function ($query) use ($data) {
                    $query->whereIn('name', $data);
                });
            })
            ->paginate(10)
            ->withQueryString();

        $users = User::query()
            ->select('id', 'name')
            ->when($request->has('searchUser'), function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->input('searchUser')}%");
            })
            ->take(5)
            ->get();


        $projects = Project::query()
            ->select('id', 'name')
            ->when($request->has('searchProject'), function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->input('searchProject')}%");
            })
            ->take(5)
            ->get();

        return Inertia::render('Tickets/Index', [
            'tickets' => $tickets,
            'users' => $users,
            'projects' => $projects,
            'filters' => $request->all(['searchTitle', 'searchUser', 'selectedUser', 'searchProject', 'selectedProject']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
