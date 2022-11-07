<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Model;
use App\Models\PatientRecord\Appearance;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Injection extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'injection',
        'personnel_name',
        'personnel_id'
    ];

    public function appearance() 
    {
        return $this->belongsTo(Appearance::class);
    }
}
