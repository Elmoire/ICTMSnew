<?php

namespace Database\Factories;

use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\IDGenerator;
use App\Models\ConferenceRoom;
/**
 * @extends Factory<Office>
 */
class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Office::class;

    public function definition(): array
    {
        $idGenerator = new IDGenerator();
        return [
            'OfficeID' => $idGenerator->generateID_10(),
            'OfficeName' => $this->faker->name(),
            'OfficeLocation' => $this->faker->city(),
        ];
    }

    public function generateUniqueID(): string
    {
        $idGenerator = new IDGenerator();
        do {
            $generatedID = $idGenerator->generateID_10();
        } while (Office::query()->where('OfficeID', $generatedID)->exists());

        return $generatedID;
    }

    #1
    public function HR(): Factory
    {
        return $this->state(function (array $attributes) {
            $generatedID = $this->generateUniqueID();
            return [
                'OfficeID' => $generatedID,
                'OfficeName' => 'Human Resources',
                'OfficeLocation' => 'Diamond Building',
            ];
        });
    }

    #2
    public function PPD(): Factory
    {
        return $this->state(function (array $attributes) {
            $generatedID = $this->generateUniqueID();
            return [
                'OfficeID' => $generatedID,
                'OfficeName' => 'Policy and Plans Division',
                'OfficeLocation' => 'Diamond Building',
            ];
        });
    }

    #3
    public function ICTMS(): Factory
    {
        return $this->state(function (array $attributes) {
            $generatedID = $this->generateUniqueID();
            return [
                'OfficeID' => $generatedID,
                'OfficeName' => 'Information and Communications Technology Management Service',
                'OfficeLocation' => 'Diamond Building',
            ];
        });
    }

    #4
    public function SocPen(): Factory
    {
        return $this->state(function (array $attributes) {
            $generatedID = $this->generateUniqueID();
            return [
                'OfficeID' => $generatedID,
                'OfficeName' => 'Social Pension for Indigent Senior Citizens',
                'OfficeLocation' => 'Diamond Building',
            ];
        });
    }

    #5
    public function CashUnit(): Factory
    {
        return $this->state(function (array $attributes) {
            $generatedID = $this->generateUniqueID();
            return [
                'OfficeID' => $generatedID,
                'OfficeName' => 'Cash Unit',
                'OfficeLocation' => 'Diamond Building',
            ];
        });
    }
}
