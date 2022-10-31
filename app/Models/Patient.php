<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'patient_id'
    ];

    public function patient() 
    {
        return $this->hasMany('Record');
    }
}
