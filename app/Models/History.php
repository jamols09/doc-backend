<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Symptoms;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
    ];

    public function symptoms()
    {
        return $this->hasMany(Symptoms::class); //[History.id] & [Symptoms.patient_id]
    }
}
