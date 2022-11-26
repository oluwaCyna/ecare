<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Admin Add Personnel Page
    public function password()
    {
        return view('admin.password');
    }

    public function checkPassword(Request $request)
    {
        $password = Admin::find(1)->raw_password;
        if ($password == $request->password) {
            session(['dashboard_pass' => 'authenticated']);
            $user = Admin::find(1)->first();
            return view('admin.dashboard', compact('user'));
        }
        redirect('/password')->with('error', 'Password is incorrect!');
        return view('admin.password');
    }
    
    public function dashboard()
    {
        $user = Admin::find(1)->first();
        return view('admin.dashboard', compact('user'));
    }

    public function personnel()
    {
        return view('admin.personnel-check');
    }

    public function checkPersonnel(Request $request)
    {
        $password = Admin::find(1)->raw_password;
        if ($password == $request->password) {
            session(['personnel_pass' => 'authenticated']);
            return view('admin.add-personnel'); 
        }
        redirect('/personnel')->with('error', 'Password is incorrect!');
        return view('admin.personnel-check');
    }

    public function add()
    {
        return view('user.admin.add-personnel');
    }

    public function updateAdmin()
    {
        return view('admin.update-check');
    }

    public function checkAdmin(Request $request)
    {
        $password = Admin::find(1)->raw_password;
        if ($password == $request->password) {
            session(['update_pass' => 'authenticated']);
            $user = User::find(1)->first();
            return view('admin.update', compact('user')); 
        }
        redirect('/admin-pass')->with('error', 'Password is incorrect!');
        return view('admin.update-check');
    }

    public function editAdmin()
    {
        $user = Admin::find(1)->first();
        return view('admin.update', compact('user'));
    }

    public function saveEditAdmin(Request $request)
    {
            $user = User::find(1)->first();

            if($request->image != null && $request->image->isValid())
            {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('profile-picture'), $imageName);
            }else [
                $imageName = $user->image
            ];
            User::where('id', 1)->update([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
            ]);

            Admin::where('user_id', 1)->update([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender'=> $request->gender,
                'phone'=> $request->phone,
                'email' => $request->email,
                'address'=> $request->address,
                'raw_password'=> $request->password,
                'password'=> Hash::make($request->password),
                'image'=> $imageName,
            ]);
            $user = Admin::find(1)->first();
        return view('admin.update', compact('user'))->with('success', 'Updated successfuly');
    }

    public function logout()
    {
        session()->forget('dashboard_pass');
        session()->forget('personnel_pass');
        session()->forget('update_pass');
        return view('welcome');
    }
}
