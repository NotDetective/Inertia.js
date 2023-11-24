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
        $users = User::factory(110)->create()->each(fn($user) => [
            $user->addMediaFromUrl("https://i.pravatar.cc/150?u={$user->id}")->toMediaCollection('avatars'),
        ]);

        $projects = Project::factory(10)->create();

        Ticket::factory(100)->create([
            'user_id' => $users->random()->id,
            'project_id' => $projects->random()->id,
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'user@app.com',
        ]);
    }
}
