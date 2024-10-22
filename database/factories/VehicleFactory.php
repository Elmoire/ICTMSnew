<?php

namespace Database\Factories;

use App\Helpers\IDGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idGenerator = new IDGenerator();
        return [
            'VehicleID' => $idGenerator->generateID_3(),
            'VehicleType' => fake()->word(),
            'Availability' => 'Available',
            'PlateNo' => fake()->regexify('[A-Z0-9]{8}'),
            'Capacity' => fake()->numberBetween(1, 20),
        ];
    }
}
