<?php

namespace App\Http\Controllers;

use App\Helpers\IDGenerator;
use App\Models\ConferenceRequest;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Office;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\VehicleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;

// ...


class VehicleController extends Controller
{
    private function generateUniqueID(): string
    {
        $idGenerator = new IDGenerator();
        do {
            $generatedID = $idGenerator->generateID_10();
        } while (VehicleRequest::query()->where('VRequestID', $generatedID)->exists());

        return $generatedID;
    }

    private function generateUniqueVRPassID(): string
    {
        $idGenerator = new IDGenerator();
        do {
            $generatedID = $idGenerator->generateID_10(); // Assuming the same length of ID
        } while (DB::table('vrequest_passenger')->where('VRPassID', $generatedID)->exists());

        return $generatedID;
    }

    /**
     * @throws ValidationException
     */
    public function submitVForm(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'officeName' => 'required|string|exists:offices,OfficeID',
                'Purpose' => 'required|string|max:50',
                'passengers' => 'required|array',
                'passengers.*' => 'string|exists:employees,EmployeeID',
                'date_start.*' => 'required|date',
                'date_end' => 'required|array|min:1',
                'date_end.*' => 'required|date|after_or_equal:date_start.*',
                'time_start' => 'required|array|min:1',
                'time_start.*' => 'required|date_format:H:i',
                'Destination' => 'required|string|max:50',
                'RequesterName' => 'required|string|max:50',
                'RequesterEmail' => 'required|email|max:50',
                'RequesterContact' => 'required|string|max:13',
                'RequesterSignature' => 'required|file|mimes:png,jpg,jpeg|max:32256',
            ]);

            $passengers = $validated['passengers'];
            if (count($passengers) !== count(array_unique($passengers))) {
                throw ValidationException::withMessages(['passengers' => 'Duplicate passengers are not allowed.']);
            }

            // Custom validation for duplicate dates
            $dates = $validated['date_start'];
            if (count($dates) !== count(array_unique($dates))) {
                throw ValidationException::withMessages(['date_start' => 'Duplicate dates are not allowed.']);
            }

            $office = Office::query()->where('OfficeID', $validated['officeName'])->firstOrFail();

            foreach ($validated['date_start'] as $index => $dateStart) {
                $generatedID = $this->generateUniqueID();
                $requesterSignaturePath = null;

                if ($request->hasFile('RequesterSignature')) {
                    $requesterSignaturePath = $request->file('RequesterSignature')->store('/uploads/signatures', 'public');
                }

                VehicleRequest::create([
                    'VRequestID' => $generatedID,
                    'OfficeID' => $office->OfficeID,
                    'Purpose' => $validated['Purpose'],
                    'date_start' => $dateStart,
                    'date_end' => $validated['date_end'][$index],
                    'time_start' => $validated['time_start'][$index],
                    'Destination' => $validated['Destination'],
                    'RequesterName' => $validated['RequesterName'],
                    'RequesterContact' => $validated['RequesterContact'],
                    'RequesterEmail' => $validated['RequesterEmail'],
                    'RequesterSignature' => $requesterSignaturePath,
                    'IPAddress' => $request->ip(),
                    'DriverID' => null,
                    'VehicleID' => null,
                    'ReceivedBy' => null,
                    'Remarks' => null,
                    'AAID' => null,
                    'SOID' => null,
                    'FormStatus' => 'Pending',
                    'EventStatus' => '-',
                ]);
            }

            foreach ($passengers as $passenger) {
                $VRPassID = $this->generateUniqueVRPassID();
                DB::table('vrequest_passenger')->insert([
                    'VRPassID' => $VRPassID,
                    'VRequestID' => $generatedID,
                    'EmployeeID' => $passenger,
                ]);
            }

            return redirect()->back()->with('success', 'Vehicle request submitted successfully.');
        } catch (ValidationException $e) {
            Log::error('Validation errors: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Throwable $e) {
            Log::error('Vehicle request submission failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Form submission failed. Please try again.');
        }
    }

    public function getRequestData($CRequestID): View|Factory|Application
    {
        $requestData = VehicleRequest::with('office', 'conferenceRoom')->findOrFail($CRequestID);
        return view('ConferencedetailEdit', compact('requestData'));
    }

    public function fetchSortedRequests(Request $request): \Illuminate\Http\JsonResponse
    {
        $sort = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');
        $formStatuses = $request->get('form_statuses', ['Approved', 'Pending']);
        $eventStatuses = $request->get('event_statuses', ['Ongoing', '-']);

        Log::info('Filter parameters:', [
            'sort' => $sort,
            'order' => $order,
            'form_statuses' => $formStatuses,
            'event_statuses' => $eventStatuses,
        ]);

        $query = VehicleRequest::with('driver', 'vehicle', 'office', 'passenger')
            ->orderBy($sort, $order);

        if ($formStatuses) {
            $query->whereIn('FormStatus', $formStatuses);
        }

        if ($eventStatuses) {
            $query->whereIn('EventStatus', $eventStatuses);
        }

        $vehicleRequests = $query->get();

        Log::info('Query results:', $vehicleRequests->toArray());

        return response()->json($vehicleRequests);
    }
}
