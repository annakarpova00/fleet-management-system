<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Fleet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarFleetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = Car::all();
        $fleets = Fleet::all();

        if ($cars->isEmpty() || $fleets->isEmpty()) {
            return;
        }

        foreach ($cars as $car) {
            $car->fleets()->attach($fleets->random(rand(1, 3))->pluck('id'));
        }
    }
}
