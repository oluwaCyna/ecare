<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Nurse;
use App\Models\Doctor;
use App\Models\Pharmacy;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function statusUpdate (Request $request)
    {
        $id = Auth::user()->id;
        User::where('id', $id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }

}