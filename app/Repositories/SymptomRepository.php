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
        $result = [];
        foreach($data as $value) {
            $result[] = $this->data::create($value)->id;
        }
        return $result;
    }

    public function getAllSymptoms()
    {
        return $this->data::distinct()->where('name', '!=', null)->get(['name']);
    }
}