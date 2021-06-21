<?php

namespace App\Repositories;

use App\Models\Patient;

class PatientRepository
{

    protected $data;

    public function __construct(Patient $data)
    {
        $this->data = $data;
    }
    
    public function createPatient($data)
    {
        return $this->data::create($data);
    }

    public function getPatients()
    {
        return $this->data::get();
    }

    public function getPatientAddress($data)
    {
        return $this->data::find($data)->address;
    }

    public function getPatientTable($data)
    {
        $startRow = $data->input('startRow');
        $fetchCount = $data->input('fetchCount');
        $filter = $data->input('filter');
        $sortBy = $data->input('sortBy');
        $orderBy = ($data->input('descending') == 'true') ? 'desc' : 'asc' ;
        $type = $data->input('type');

        if(empty($filter) && empty($type)) {
            $page = $this->data;
        } elseif($filter && empty($type)) {
            $page = $this->data
                ->whereRaw("CONCAT(`firstname`, ' ', `middlename`, ' ', `lastname`) LIKE ?", ['%'.$filter.'%'])
                ->orWhere('referred_by','like','%'.$filter.'%')
                ->orWhere('birthdate','like','%'.$filter.'%')
                ->orWhere('telephone','like','%'.$filter.'%');
        } else {
            $page = $this->data->where($type,'like','%'.$filter.'%');
        }

        $page = $page->orderBy($sortBy, $orderBy);
        
        $page = $page->paginate($fetchCount);
        
        return $page;
    }

    public function createAvatar($data)
    {
        $this->data::where('id', $data['id'])->update(['avatar' => $data['path'] ]);
    }
}