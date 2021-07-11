<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

use App\Http\Requests\Medicine\MedicineCreateMultipleRequest;
use App\Services\MedicineService;

class MedicineController extends Controller
{
    protected $medicine;

    public function __construct(MedicineService $medicine)
    {
        $this->medicine = $medicine;
    }
 
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }
 
    public function store(MedicineCreateMultipleRequest $request)
    {
        
        $validated = $request->validated();
        
        try {
            $result = $this->medicine->createMedicine($validated);
        }
        catch(\Throwable $e) {
            \Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json($result);
    }

}
