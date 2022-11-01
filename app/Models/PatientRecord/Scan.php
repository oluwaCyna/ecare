<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'scan',
        'personnel_name',
        'personnel_id'
    ];

    public function scan() 
    {
        return $this->belongsTo('Appearance');
    }
}
