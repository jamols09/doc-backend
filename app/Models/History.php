<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Symptoms;
use App\Models\Diagnosis;
class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
    ];

    public function symptoms()
    {
        return $this->hasMany(Symptoms::class); //[Symptoms.history_id] & [History.id]
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class); //[Diagnosis.history_id] & [History.id]
    }
}
