<?php

namespace App\Repositories;

use App\Models\Symptoms;

class SymptomRepository
{

    protected $data;

    public function __construct(Symptoms $data)
    {
        $this->data = $data;
    }
    
    public function createSymptom($data)
    {
        return $this->data::create($data);
    }
}