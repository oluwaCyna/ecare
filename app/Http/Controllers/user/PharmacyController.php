<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PharmacyRequest;

class PharmacyController extends Controller
{
    // Pharmacy Dashboard or Profile Home
    public function dashboard()
    {
        $id = Auth::user()->id;
        $user = DB::table('pharmacies')->where('user_id', $id)->first();
        return view('user.pharmacy.dashboard', compact('user'));
    }

    // Pharmacy Profile Update
    public function updatePharmacy()
    {
        $id = Auth::user()->id;
        $user = DB::table('pharmacies')->where('user_id', $id)->first();
        return view('user.pharmacy.update', compact('user'));
    }

    // Pharmacy Profile Update Save
    public function saveUpdatePharmacy(PharmacyRequest $request)
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

        Pharmacy::where('user_id', $id)->update([
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
        return view('user.pharmacy.update');
    }

    // Pharmacy View Pharmacy's list
    public function pharmacyListPharmacy()
    {
        return view('user.pharmacy.Pharmacy-list');
    }

    // Pharmacy View Nurse's list
    public function nurseListPharmacy()
    {
        return view('user.pharmacy.nurse-list');
    }

    // Pharmacy Add Drugs
    public function addPharmacy()
    {
        return view('user.pharmacy.add');
    }

}
