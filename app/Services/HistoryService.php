<?php

namespace App\Services;

use App\Repositories\HistoryRepository;
use Amazon;
class HistoryService
{

    protected $historyRepository;

    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    /**
     * Create new patient record
     *
     * @param  mixed $data
     * @return void
     */

    public function createHistory($data)
    {
        return $this->historyRepository->createHistory($data);
    }
        
    /**
     * Save file to amazon
     *
     * @param  mixed $data
     * @return void
     */
    public function createFile($data)
    {
        \Log::info($data);
        if($data->hasFile('history')) {
            $url = Amazon::upload($data, 'history');
            return $this->historyRepository->createFile(['path' => $url, 'patient_id' => $data['patient_id'], 'id' => $data['id'] ]);
        }
    }
}