<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Address;
use App\Models\History;
use App\Models\Diagnosis;
use App\Models\Symptoms;
class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'sex',
        'birthdate',
        'height',
        'height_inches',
        'height_unit',
        'weight',
        'weight_unit',
        'occupation',
        'nationality',
        'status',
        'referred_by',
        'telephone',
        'mobile'
    ];

    public function history()
    {
        return $this->hasMany(History::class); //[History.patient_id] & [Patient.id]
    }
    
    public function address()
    {
        return $this->hasMany(Address::class); //[Address.patient_id] & [Patient.id]
    }
    
    public function diagnoses()
    {
        return $this->hasManyThrough(Diagnosis::class, History::class); //patient has many diagnosis through history
    }

    public function symptoms()
    {
        return $this->hasManyThrough(Symptoms::class, History::class); //patient has many symptoms through history
    }

    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->middlename.' '.$this->lastname;
    }
}
