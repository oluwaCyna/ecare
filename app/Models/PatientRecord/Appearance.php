<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
    protected $fillable = [
        'record_id',
        'record_title',
        'title',
        'personnel_name',
        'personnel_id' 
    ];

    public function appearance() 
    {
        return $this->belongsTo('Record');
    }
    
    public function comment() 
    {
        return $this->hasMany('Comment');
    }

    public function diagnosis() 
    {
        return $this->hasMany('Diagnosis');
    }

    public function test() 
    {
        return $this->hasMany('Test');
    }

    public function test_result() 
    {
        return $this->hasMany('TestResult');
    }

    public function scan() 
    {
        return $this->hasMany('Scan');
    }

    public function scan_result() 
    {
        return $this->hasMany('ScanResult');
    }

    public function treatment() 
    {
        return $this->hasMany('Treatment');
    }

    public function injection() 
    {
        return $this->hasMany('Injection');
    }

    public function drug() 
    {
        return $this->hasMany('Drug');
    }

    public function drug_available() 
    {
        return $this->hasMany('DrugAvailable');
    }

}
