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
        return $this->data::create($data);
    }
}