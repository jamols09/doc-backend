<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'file_name',
        'physician_id',
    ];
}
