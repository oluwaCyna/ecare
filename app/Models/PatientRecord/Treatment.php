<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Model;
use App\Models\PatientRecord\Appearance;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'treatment',
        'personnel_name',
        'personnel_id'
    ];

    public function appearance() 
    {
        return $this->belongsTo(Appearance::class);
    }
}
