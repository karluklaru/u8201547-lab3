<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Train>
 */
class TrainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'departure_station' => fake()->word(),
            'arrival_station' => fake()->word(),
            'departure_time' => fake()->time('H:i:s', 'now'),
            'arrival_time' => fake()->time('H:i:s', 'now'),
            'cars_number' => rand(5, 20)
        ];
    }
}
