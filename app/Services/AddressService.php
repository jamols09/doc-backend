<?php

namespace App\Services;

use App\Repositories\AddressRepository;

class AddressService
{

    protected $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * Create new Patient Address Record
     *
     * @param  mixed $data
     * @return void
     */

    public function createAddress($data)
    {
        return $this->addressRepository->createAddress($data);
    }
}