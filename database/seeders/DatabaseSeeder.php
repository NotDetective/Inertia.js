<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create()->each(fn($user) => [
            $user->addMediaFromUrl("https://i.pravatar.cc/150?u={$user->id}")->toMediaCollection('avatars'),
            Project::factory(10)->create()->each(fn($project) => [
                Ticket::factory(10)->create(['project_id' => $project->id, 'user_id' => $user->id]),
            ]),
        ]);



        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'user@app.com',
        ]);
    }
}
