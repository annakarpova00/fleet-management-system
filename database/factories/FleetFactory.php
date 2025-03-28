<?php

namespace Database\Factories;

use App\Models\Fleet;
use Illuminate\Database\Eloquent\Factories\Factory;

class FleetFactory extends Factory
{
    protected $model = Fleet::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'address' => $this->faker->word(),
            'schedule' => $this->faker->word(),
        ];
    }
}
