<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LaboratoryRequest;

class LaboratoryController extends Controller
{
    // Laboratory Dashboard or Profile Home
    public function dashboard()
    {
        $id = Auth::user()->id;
        $user = DB::table('laboratories')->where('user_id', $id)->first();
        return view('user.laboratory.dashboard', compact('user'));
    }

    // Laboratory Profile Update
    public function updateLaboratory()
    {
        $id = Auth::user()->id;
        $user = DB::table('laboratories')->where('user_id', $id)->first();
        return view('user.laboratory.update', compact('user'));
    }

    // Laboratory Profile Update Save
    public function saveUpdateLaboratory(LaboratoryRequest $request)
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

        Laboratory::where('user_id', $id)->update([
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
        return view('user.laboratory.update');
    }

    // Laboratory View Laboratory's list
    public function laboratoryListLaboratory()
    {
        return view('user.Laboratory.laboratory-list');
    }

    // Laboratory View Nurse's list
    public function nurseListLaboratory()
    {
        return view('user.laboratory.nurse-list');
    }

    // Laboratory Add Drugs
    public function addLaboratory()
    {
        return view('user.laboratory.add');
    }
}
