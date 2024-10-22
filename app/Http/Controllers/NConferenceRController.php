<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConferenceRoom;
use App\Helpers\IDGenerator;
use Throwable;

class NConferenceRController extends Controller
{
    private function generateUniqueID(): string
    {
        $idGenerator = new IDGenerator();
        do {
            $generatedID = $idGenerator->generateID_10();
        } while (ConferenceRoom::query()->where('CRoomID', $generatedID)->exists());

        return $generatedID;
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'CRoomName' => 'required|string|max:30',
            'Location' => 'required|string|max:30',
            'Capacity' => 'required|integer|min:1',
        ]);

        try {
            $generatedID = $this->generateUniqueID();  // Generate the unique ID

            $conferenceRoom = ConferenceRoom::create([
                'CRoomID' => $generatedID,
                'Availability' => 'Available',
                'CRoomName' => $request->CRoomName,
                'Location' => $request->Location,
                'Capacity' => $request->Capacity,
            ]);

            return redirect()->back()->with('success', 'Conference details saved successfully!');
        } catch (Throwable $e) {
            // Handle the exception and return an error message
            return redirect()->back()->with('error', 'An error occurred while saving conference details. Please try again.');
        }
    }
}
