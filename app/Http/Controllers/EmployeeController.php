<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Helpers\IDGenerator;
use Illuminate\Support\Facades\Log;
use Exception;

class EmployeeController extends Controller
{
    private function generateUniqueID(): string
    {
        $idGenerator = new IDGenerator();
        do {
            $generatedID = $idGenerator->generateID_8();
        } while (Employee::query()->where('EmployeeID', $generatedID)->exists());

        return $generatedID;
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'EmployeeName' => 'required|string|max:50',
                'EmployeeEmail' => 'required|email|max:30',
                'officeName' => 'required|string|exists:offices,OfficeID',
            ]);

            $generatedID = $this->generateUniqueID();
            $office = Office::query()->where('OfficeID', $validated['officeName'])->firstOrFail();

            Employee::create([
                'EmployeeID' => $generatedID,
                'EmployeeName' => $validated['EmployeeName'],
                'EmployeeEmail' => $validated['EmployeeEmail'],
                'OfficeID' => $office->OfficeID,
            ]);

            return redirect()->back()->with('success', 'Employee added successfully!');
        } catch (Exception $e) {
            // Log the error
            Log::error('Error adding employee: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add employee.');
        }
    }
}
