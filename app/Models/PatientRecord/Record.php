<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'patient_id',
        'title'
    ];

    public function record() 
    {
        return $this->belongsTo('Patient');
    }
    
    public function appearance() 
    {
        return $this->hasMany('Appearance');
    }

}
