<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'diagnosis',
        'personnel_name',
        'personnel_id'
    ];

    public function diagnosis() 
    {
        return $this->belongsTo('Appearance');
    }
}
