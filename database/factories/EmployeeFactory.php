<?php

namespace Database\Factories;

use App\Models\ConferenceRoom;
use App\Models\Employee;
use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\IDGenerator;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
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
            $generatedID = $idGenerator->generateID_10();
        } while (Employee::query()->where('EmployeeID', $generatedID)->exists());

        return $generatedID;
    }

    public function definition(): array
    {
        $generatedID = $this->generateUniqueID();
        $officeID = Office::query()->inRandomOrder()->value('OfficeID');

        return [
            'EmployeeID' => $generatedID,
            'EmployeeEmail' => fake()->unique()->userName() . '@dswd.gov.ph',
            'EmployeeName' => fake()->name(),
            'OfficeID' => $officeID,
        ];
    }
}
