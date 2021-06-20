<?php

namespace App\Services;

use App\Repositories\SymptomRepository;

class SymptomService
{

    protected $symptomRepository;

    public function __construct(SymptomRepository $symptomRepository)
    {
        $this->symptomRepository = $symptomRepository;
    }

    public function createSymptom($data)
    {
        return $this->symptomRepository->createSymptom($data);
    }

    public function getAllSymptoms()
    {
        return $this->symptomRepository->getAllSymptoms();
    }
}