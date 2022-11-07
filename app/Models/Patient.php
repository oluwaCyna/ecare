<?php

namespace App\Models;

use App\Models\PatientRecord\Record;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'phone',
        'email',
        'address',
        'height',
        'blood_group',
        'image',
        'patient_key'
    ];

    public function record() 
    {
        return $this->hasMany(Record::class);
    }
}
