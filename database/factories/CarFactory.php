<?php

namespace Database\Factories;

use App\Models\Car;
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
    protected $model = Car::class;
    public function definition(): array
    {
        return [
            'number' => $this->faker->numberBetween(000, 999),
            'driver_name' => $this->faker->word(),
        ];
    }
}
