<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository
{

    protected $data;

    public function __construct(Address $data)
    {
        $this->data = $data;
    }
    
    public function createAddress($data)
    {
        return $this->data::create($data);
    }
}