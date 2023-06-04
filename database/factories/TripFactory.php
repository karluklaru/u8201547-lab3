<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Domain\Trains\Models\Train;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $trainsIds = Train::pluck('id');
        return [
            'departure_date' => fake()->date('Y-m-d', 'now'),
            'train_id' => fake()->randomElement($trainsIds),
            'ticket_count' => rand(60, 100),
            'ticket_price' => rand(100000, 1000000)
        ];
    }
}
