<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Laboratory;
use App\Models\Nurse;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

class UserListController extends Controller
{
    public function userList()
    {
        $doctor = Doctor::all();
        $nurse = Nurse::all();
        $pharmacy = Pharmacy::all();
        $laboratory = Laboratory::all();
        return view('user.personnel-list', compact('doctor', 'nurse', 'pharmacy', 'laboratory'));
    }

}