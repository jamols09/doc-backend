<?php

namespace App\Repositories;

use App\Models\History;

class HistoryRepository
{

    protected $data;

    public function __construct(History $data)
    {
        $this->data = $data;
    }
    
    public function createHistory($data)
    {
        return $this->data::create($data);
    }
}