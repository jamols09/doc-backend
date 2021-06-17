<?php

namespace App\Http\Controllers;

use App\Http\Requests\Diagnosis\DiagnosesCreateMultipleRequest;
use Illuminate\Http\Request;

use App\Services\DiagnosisService;
class DiagnosisController extends Controller
{
    
    protected $diagnosis;

    public function __construct(DiagnosisService $diagnosis)
    {
        $this->diagnosis = $diagnosis;
    }

    public function store(DiagnosesCreateMultipleRequest $request)
    {
        $validated = $request->validated();
        try {
            $result = $this->diagnosis->createDiagnosis($validated);
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json($result);
    }
}
