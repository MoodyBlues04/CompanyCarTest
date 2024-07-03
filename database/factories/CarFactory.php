<?php

namespace Database\Factories;

use App\Models\Comfort;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => fake()->name,
            'driver_id' => Driver::query()->inRandomOrder()->first()->id,
            'comfort_id' => Comfort::query()->inRandomOrder()->first()->id,
        ];
    }
}
