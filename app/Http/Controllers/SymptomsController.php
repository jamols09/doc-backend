<?php

namespace App\Http\Controllers;

use App\Http\Requests\Symptom\SymptomsCreateMultipleRequest;
use Illuminate\Http\Request;

use App\Services\SymptomService;
class SymptomsController extends Controller
{

    protected $symptom;

    public function __construct(SymptomService $symptom)
    {
        $this->symptom = $symptom;
    }

    public function store(SymptomsCreateMultipleRequest $request)
    {
        $validated = $request->validated();
        try {
            $result = $this->symptom->createSymptom($validated);
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json($result);
    }

    public function dropdown() {
        try {
            $result = $this->symptom->getAllSymptoms();
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return \response()->json($result);
    }
}
