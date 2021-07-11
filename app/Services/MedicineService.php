<?php

namespace App\Services;

use App\Repositories\MedicineRepository;
use Amazon;

class MedicineService
{
    protected $medicineRepository;

    public function __construct(MedicineRepository $medicineRepository)
    {
        $this->medicineRepository = $medicineRepository;
    }
    
    /**
     * Create new medicine record
     *
     * @param  string $data
     * @return id
     */

    public function createMedicine($data)
    {
        return $this->medicineRepository->createMedicine($data);
    }
}