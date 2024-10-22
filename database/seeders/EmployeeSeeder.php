<?php

namespace Database\Seeders;

use App\Models\ConferenceRoom;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 9; $i++) {
            $this->createEmployee();
        }
    }

    private function createEmployee(): void
    {
        $employeeFactory = Employee::factory();
        $employee = $employeeFactory->make();

        if (!Employee::query()->where('EmployeeID', $employee->EmployeeID)->exists()) {
            $employee->save();
        } else {
            echo "<script>alert('Duplicate ID found for Employee');</script>";
        }
    }
}
