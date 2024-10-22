<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Helpers\IDGenerator;
use Throwable;

class NDriverController extends Controller
{
    private function generateUniqueID(): string
    {
        $idGenerator = new IDGenerator();
        do {
            $generatedID = $idGenerator->generateID_8();
        } while (Driver::query()->where('DriverID', $generatedID)->exists());

        return $generatedID;
    }


    public function store(Request $request)
    {
        $request->validate([
            'DriverName' => 'required|string|max:50',
            'DriverEmail' => 'required|email|max:30',
            'ContactNo' => 'required|string|max:13',
        ]);

        $generatedID = $this->generateUniqueID();

        Driver::create([
            'DriverID' => $generatedID,
            'DriverName' => $request->DriverName,
            'DriverEmail' => $request->DriverEmail,
            'ContactNo' => $request->ContactNo,
            'Availability' => 'Available',
        ]);

        return redirect()->back()->with('success', 'Driver added successfully!');
    }
}
