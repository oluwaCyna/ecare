<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Injection extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'injection',
        'personnel_name',
        'personnel_id'
    ];

    public function injection() 
    {
        return $this->belongsTo('Appearance');
    }
}
