<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
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
        'image',
        'raw_password',
        'password'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
