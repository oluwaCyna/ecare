<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Nurse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NurseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NurseController extends Controller
{
    // Nurse Dashboard or Profile Home
    public function dashboard()
    {
        $id = Auth::user()->id;
        $user = DB::table('nurses')->where('user_id', $id)->first();
        return view('user.nurse.dashboard', compact('user'));
    }

    // Nurse Profile Update
    public function updateNurse()
    {
        $id = Auth::user()->id;
        $user = DB::table('nurses')->where('user_id', $id)->first();
        return view('user.nurse.update', compact('user'));
    }

    // Nurse Profile Update Save
    public function saveUpdateNurse(NurseRequest $request)
    {
        $id = Auth::user()->id;
        $imageName = "";
        
        if($request->image != null && $request->image->isValid())
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('profile-picture'), $imageName);
        }
        User::where('id', $id)->update([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        Nurse::where('user_id', $id)->update([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender'=> $request->gender,
            'phone'=> $request->phone,
            'email' => $request->email,
            'address'=> $request->address,
            'education'=> $request->education,
            'specialization'=> $request->specialization,
            'speciality'=> $request->speciality,
            'language'=> $request->language,
            'bio'=> $request->bio,
            'image'=> $imageName,
        ]);
        return view('user.nurse.update');
    }

    
}
