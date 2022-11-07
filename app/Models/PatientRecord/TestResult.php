<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Model;
use App\Models\PatientRecord\Appearance;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestResult extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'test_result',
        'personnel_name',
        'personnel_id'
    ];

    public function appearance() 
    {
        return $this->belongsTo(Appearance::class);
    }
}
