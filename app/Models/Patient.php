<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Address;

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
    //class Patient extends Model
    public function address()
    {
        return $this->hasMany(Address::class); //[Patient.id] & [Address.patient_id]
    }

    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->middlename.' '.$this->lastname;
    }
}
