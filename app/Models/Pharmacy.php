<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = [
        'user_id',
        'personnel_id',
        'title',
        'first_name',
        'last_name',
        'gender',
        'phone',
        'email',
        'address',
        'education',
        'specialization',
        'speciality',
        'language',
        'bio',
        'image',
        'raw_password',
        'password'
    ];

    public function pharm() 
    {
        return $this->belongsTo('User');
    }
}

