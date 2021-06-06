<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository
{

    protected $patient;

    public function __construct(Address $data)
    {
        $this->data = $data;
    }
    
    public function create($data)
    {
        return $this->data::create($data);
    }
}