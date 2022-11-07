<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin;
use App\Models\Nurse;
use App\Models\Doctor;
use App\Models\Pharmacy;
use App\Models\Laboratory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'email',
        'role',
        'raw_password',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin() 
    {
        return $this->hasOne(Admin::class);
    }

    public function doctor() 
    {
        return $this->hasOne(Doctor::class);
    }

    public function nurse() 
    {
        return $this->hasOne(Nurse::class);
    }

    public function laboratory() 
    {
        return $this->hasOne(Laboratory::class);
    }

    public function pharmacy() 
    {
        return $this->hasOne(Pharmacy::class);
    }

}
