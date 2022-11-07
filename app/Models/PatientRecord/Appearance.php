<?php

namespace App\Models\PatientRecord;

use App\Models\PatientRecord\Drug;
use App\Models\PatientRecord\Scan;
use App\Models\PatientRecord\Test;
use App\Models\PatientRecord\Record;
use App\Models\PatientRecord\Comment;
use App\Models\PatientRecord\Diagnosis;
use App\Models\PatientRecord\Injection;
use App\Models\PatientRecord\Treatment;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientRecord\ScanResult;
use App\Models\PatientRecord\TestResult;
use App\Models\PatientRecord\DrugAvailable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appearance extends Model
{
    protected $fillable = [
        'record_id',
        'record_title',
        'title',
        'personnel_name',
        'personnel_id' 
    ];

    public function record() 
    {
        return $this->belongsTo(Record::class);
    }
    
    public function comment() 
    {
        return $this->hasMany(Comment::class);
    }

    public function diagnosis() 
    {
        return $this->hasMany(Diagnosis::class);
    }

    public function test() 
    {
        return $this->hasMany(Test::class);
    }

    public function test_result() 
    {
        return $this->hasMany(TestResult::class);
    }

    public function scan() 
    {
        return $this->hasMany(Scan::class);
    }

    public function scan_result() 
    {
        return $this->hasMany(ScanResult::class);
    }

    public function treatment() 
    {
        return $this->hasMany(Treatment::class);
    }

    public function injection() 
    {
        return $this->hasMany(Injection::class);
    }

    public function drug() 
    {
        return $this->hasMany(Drug::class);
    }

    public function drug_available() 
    {
        return $this->hasMany(DrugAvailable::class);
    }

}
