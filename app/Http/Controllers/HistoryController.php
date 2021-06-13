<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoryCreateRequest;
use Illuminate\Http\Request;

use App\Services\HistoryService;
use App\Services\SymptomService;
use App\Services\DiagnosisService;
class HistoryController extends Controller
{
    protected $history;

    public function __construct(HistoryService $history, SymptomService $symptom, DiagnosisService $diagnosis)
    {
        $this->history = $history;
        $this->symptom = $symptom;
        $this->diagnosis = $diagnosis;
    }

    public function index(Request $request)
    {
        try {
            $result = '';
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json($result);
    }

    public function store(HistoryCreateRequest $request)
    {
        $validated = $request->validated();
        try {
            $result = $this->history->createHistory($validated);
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json($result);
    }
}
