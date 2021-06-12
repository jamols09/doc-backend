<?php

namespace App\Services;

use App\Repositories\HistoryRepository;

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
    
}