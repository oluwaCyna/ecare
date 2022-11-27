<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    // Doctor Dashboard or Profile Home
    public function dashboard()
    {
        $id = Auth::user()->id;
        $user = DB::table('doctors')->where('user_id', $id)->first();
        return view('user.doctor.dashboard', compact('user'));
    }

    // Doctor Profile Update
    public function updateDoctor()
    {
        $id = Auth::user()->id;
        $user = DB::table('doctors')->where('user_id', $id)->first();
        return view('user.doctor.update', compact('user'));
    }

    // Doctor Profile Update Save
    public function saveUpdateDoctor(DoctorRequest $request)
    {
            $id = Auth::user()->id;
            $user = DB::table('doctors')->where('user_id', $id)->first();

            if($request->image != null && $request->image->isValid())
            {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('profile-picture'), $imageName);
            }else [
                $imageName = $user->image
            ];
            User::where('id', $id)->update([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
            ]);

            Doctor::where('user_id', $id)->update([
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
            $user = DB::table('doctors')->where('user_id', $id)->first();
        return view('user.doctor.update', compact('user'))->with('success', 'Updated successfuly');
    }

    // Doctor View Patient Record
    public function checkRecordDoctor()
    {
        return view('user.doctor.check-record');
    }

    // Doctor Load Patient Record
    public function loadCheckRecordDoctor()
    {
        return;
    }

    // Doctor View Doctor's list
    public function doctorListDoctor()
    {
        return view('user.doctor.doctor-list');
    }

    // Doctor View Nurse's list
    public function nurseListDoctor()
    {
        return view('user.doctor.nurse-list');
    }

    // Doctor View Laboratory's list
    public function laboratoryListDoctor()
    {
        return view('user.doctor.laboratory-list');
    }

    // Doctor View Pharmacy's list
    public function pharmacyListDoctor()
    {
        return view('user.doctor.pharmacy-list');
    }
}
