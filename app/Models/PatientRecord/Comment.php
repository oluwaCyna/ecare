<?php

namespace App\Models\PatientRecord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'appearance_id',
        'appearance_title',
        'comment',
        'personnel_name',
        'personnel_id'
    ];

    public function comment() 
    {
        return $this->belongsTo('Appearance');
    }

}
