<?php

namespace App\Repositories;

use App\Models\Diagnosis;

class DiagnosisRepository
{

    protected $data;

    public function __construct(Diagnosis $data)
    {
        $this->data = $data;
    }
    
    public function createDiagnosis($data)
    {
        $result = [];
        foreach($data as $value) {
            $result[] = $this->data::create($value)->id;
        }
        return $result;
    }

    public function getAllDiagnoses()
    {
        return $this->data::distinct()->where('name', '!=', null)->get(['name']);
    }
}