<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'drug',
        'personnel_name',
        'personnel_id'
    ];

    public function drug() 
    {
        return $this->belongsTo('Appearance');
    }
}
