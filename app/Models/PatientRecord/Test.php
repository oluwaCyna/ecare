<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'test',
        'personnel_name',
        'personnel_id'
    ];

    public function test() 
    {
        return $this->belongsTo('Appearance');
    }
}
