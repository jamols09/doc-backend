<?php

namespace App\Repositories;

use App\Models\History;

use DateTime;
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

    public function createFile($data)
    {
        return $this->data::where([
                'patient_id' => $data['patient_id'],
                'id' => $data['id']
                ])->update([
                    'file' => $data['path'],
                    'history_date' => isset($data['history_date']) ? str_replace('/','-',$data['history_date']) : null,
                ]);
    }
}