<?php

namespace Database\Factories;

use App\Models\AAuthority;
use App\Helpers\IDGenerator;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AAuthority>
 */
class AAuthorityFactory extends Factory
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
        } while (AAuthority::query()->where('AAID', $generatedID)->exists());

        return $generatedID;
    }
    public function definition(): array
    {
        $generatedID = $this->generateUniqueID();
        return [
            'AAID' => $generatedID,
            'AAName' => fake()->name(),
            'AAPosition' => fake()->jobTitle(),
        ];
    }
}
