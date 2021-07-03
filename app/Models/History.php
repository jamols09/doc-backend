<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use App\Models\Symptoms;
use App\Models\Diagnosis;
use App\Models\Patient;
class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
        'patient_id',
        'history_date'
    ];

    protected $appends = [
        'created_at_formatted'
    ];

    public function symptoms()
    {
        return $this->hasMany(Symptoms::class); //[Symptoms.history_id] & [History.id]
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class); //[Diagnosis.history_id] & [History.id]
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function getCreatedAtFormattedAttribute()
    {
        if($this->history_date) 
        {
            return Carbon::createFromFormat('Y-m-d', $this->history_date)->format('M d Y');
        }
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->format('M d Y');
    }
}
