<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'project_id' => 1,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(10),
            'status' => $this->faker->randomElement(['open', 'closed', 'in progress']),
        ];
    }
}
