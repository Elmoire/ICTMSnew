<?php

namespace Database\Factories;

use App\Models\AAuthority;
use App\Models\Office;
use App\Helpers\IDGenerator;
use App\Models\SOAuthority;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SOAuthority>
 */
class SOAuthorityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function generateUniqueID(): string
    {
        $idGenerator = new IDGenerator();
        do {
            $generatedID = $idGenerator->generateID_3();
        } while (SOAuthority::query()->where('SOID', $generatedID)->exists());

        return $generatedID;
    }
    public function definition(): array
    {
        $generatedID = $this->generateUniqueID();
        return [
            'SOID' => $generatedID,
            'SOName' => fake()->name(),
            'SOPosition' => fake()->jobTitle(),
        ];
    }
}
