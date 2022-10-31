<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Patient Dashboard or Profile Home
    public function dashboard()
    {
        return view('user.patient.dashboard');
    }
 
     // Patient Record View
     public function recordsPatient()
     {
         return view('user.patient.records');
     }
}
