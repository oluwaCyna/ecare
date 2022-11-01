<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drip extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'drip',
        'personnel_name',
        'personnel_id'
    ];

    public function drip() 
    {
        return $this->belongsTo('Appearance');
    }
}
