<?php

namespace App\Services;

use App\Repositories\PatientRepository;

class PatientService
{

    protected $patientRepository;

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * Create new patient record
     *
     * @param  mixed $data
     * @return void
     */

    public function createPatient($data)
    {
        return $this->patientRepository->createPatient($data);
    }
    
    /**
     * Get all patient records
     *
     * @return void
     */

    public function getPatients()
    {
        return $this->patientRepository->getPatients();
    }
    
    /**
     * Get patient address by id
     *
     * @param  mixed $data
     * @return void
     */
    public function getPatientAddress($data)
    {
        return $this->patientRepository->getPatientAddress($data);
    }
    
    /**
     * Paginate patient data
     *
     * @param  mixed $data
     * @return void
     */
    public function getPatientTable($data)
    {
        return $this->patientRepository->getPatientTable($data);
    }

    public function createAvatar($data)
    {
        if($data->hasFile('avatar')) {
            $name = 'avatar_'.$data->file('avatar')->getClientOriginalName();
            $extension = '.jpeg';
            $path = $data->file('avatar')->storeAs('avatar', $name.''.$extension, 'public');
            return $this->patientRepository->createAvatar(['path' => '/public/' . $path, 'id' => $data['id'] ]);
        }
    }
}