<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCreateRequest;
use App\Http\Requests\Patient\PatientAvatarRequest;
use App\Http\Requests\Patient\PatientIdRequest;
use Illuminate\Http\Request;

use App\Services\PatientService;
use App\Services\AddressService;
use App\Services\SymptomService;
use App\Services\HistoryService;
use App\Services\DiagnosisService;
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

        return response()->json(['status' => 'success', 'id' => $patient->id]);
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

    public function avatar(Request $request)
    {
        try {
            $avatar = $this->patient->createAvatar($request);
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success', 'data' => $avatar]);
    }

    public function patientsDiagnoses(PatientIdRequest $request)
    {
        $validated = $request->validated();
        try {
            $result = $this->patient->getPatientsDiagnoses($validated);
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function patientsSymptoms(PatientIdRequest $request)
    {
        $validated = $request->validated();
        try {
            $result = $this->history->getPatientsSymptoms($validated);
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}