<?php

namespace App\Services;

use App\Repositories\PatientRepository;
use Amazon;

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
    
    /**
     * Save patient avatar to AWS S3
     *
     * @param  mixed $data
     * @return void
     */
    public function createAvatar($data)
    {
        if($data->hasFile('avatar')) {
            $path = Amazon::saveAvatar($data);
            $url = Amazon::getPathUrl($path);
            return $this->patientRepository->createAvatar(['path' => $url, 'id' => $data['id'] ]);
        }
    }
}