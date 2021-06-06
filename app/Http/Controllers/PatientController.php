<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCreateRequest;
use Illuminate\Http\Request;

use App\Services\PatientService;
use App\Services\AddressService;

use App\Models\Patient;
use App\Models\Address;

class PatientController extends Controller
{

    protected $patient;
    protected $address;

    public function __construct(PatientService $patientService, AddressService $addressService)
    {
        $this->patient = $patientService;
        $this->address = $addressService;
    }

    public function index(Request $request)
    {
        try {
            $result = $this->patient->getPatientTable($request);
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json($result);
    }

    public function store(PatientCreateRequest $request)
    {
        $validated = $request->validated();

        try {
            $patient = $this->patient->createPatient($validated);
            $address = $this->address->createAddress(array_merge($validated['address'], ['patient_id' => $patient->getKey()]));
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }

    public function address($patient_id)
    {
        try {
            $address = $this->patient->getPatientAddress((int)$patient_id);
            $result = ['address' => $address];
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success', 'data' => $result]);
    }

}