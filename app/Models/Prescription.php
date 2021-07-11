<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'file_name',
        'patient_id',
        'medicine_id',
        'prescription_template_id',
        'weight_type',
        'weight_amount',
        'interval',
        'frequency',
        'medicine_amount',
        'additional_info',
    ];

}
