<?php

namespace App\Services;

use App\Repositories\DiagnosisRepository;

class DiagnosisService
{

    protected $diagnosisRepository;

    public function __construct(DiagnosisRepository $diagnosisRepository)
    {
        $this->diagnosisRepository = $diagnosisRepository;
    }

    /**
     * Create new patient record
     *
     * @param  mixed $data
     * @return void
     */

    public function createDiagnosis($data)
    {
        return $this->diagnosisRepository->createDiagnosis($data);
    }
    
}