<?php

namespace App\Repositories;

use App\Models\Medicine;

class MedicineRepository
{

    protected $data;

    public function __construct(Medicine $data)
    {
        $this->data = $data;
    }
    
    public function createMedicine($data)
    {
        $result = [];
        foreach($data as $value) {
            $result[] = $this->data::create($value)->id;
        }
        return $result;
    }

}