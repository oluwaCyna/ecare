<?php

namespace App\Models\PatientRecord;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientRecord\Appearance;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    protected $fillable = [
        'patient_id',
        'patient_key',
        'title'
    ];

    public function patient() 
    {
        return $this->belongsTo(Patient::class);
    }
    
    public function appearance() 
    {
        return $this->hasMany(Appearance::class);
    }

}
