<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Nurse;
use App\Models\Doctor;
use App\Models\Pharmacy;
use App\Models\Laboratory;
use App\Mail\AdminRegister;
use App\Mail\NurseRegister;
use App\Mail\DoctorRegister;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;
    public function redirectTo()
    {
        $this->redirectTo = '/credential';
        return $this->redirectTo;
        
        // switch (Auth::user()->role) {
        //     case 'admin':
        //         $this->redirectTo = '/admin';
        //         return $this->redirectTo;
        //         break;
        //     case 'doctor':
        //         $this->redirectTo = '/doctor';
        //         return $this->redirectTo;
        //         break;
        //     case 'nurse':
        //         $this->redirectTo = 'nurse';
        //         return $this->redirectTo;
        //         break;
        //     case 'pharmacy':
        //         $this->redirectTo = 'pharmacy';
        //         return $this->redirectTo;
        //         break;
        //     case 'laboratory':
        //         $this->redirectTo = 'laboratory';
        //         return $this->redirectTo;
        //         break;
        //     default:
        //         $this->redirectTo = '/login';
        //         return $this->redirectTo;
        // }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // This function will return a random
        // string of specified length
        function random_strings($length_of_string)
        {
 
            // String of all alphanumeric character
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@$%';
        
            // Shuffle the $str_result and returns substring
            // of specified length
            return substr(str_shuffle($str_result), 0, $length_of_string);
        }
        $user_pass = random_strings(10);
        $user = User::create([
            'title' => $data['title'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'raw_password' => $user_pass,
            'password' => Hash::make($user_pass),
        ]);

        $user_id = DB::table('users')->where('email', $data['email'])->value('id');

        //Doctor
        function personnelID ($table, $prefix, $data) {
            $active_personnel = DB::table($table)->get()->count();
        if ($active_personnel > 0 && $active_personnel < 10) {
            $active_personnel = '00'.$active_personnel;
        }else if ($active_personnel > 9 && $active_personnel < 100) {
            $active_personnel = '0'.$active_personnel;
        }else {
            $active_personnel = $active_personnel;
        }

        return $personnel_id = $prefix.strtoupper(substr($data['first_name'],0,1).substr($data['last_name'],0,1)).$active_personnel;
        }

        switch ($data['role']) {

            case 'admin':
                $role_user = Admin::create([
                    'user_id' => $user_id,
                    'title' => $data['title'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'raw_password' => $user_pass,
                    'password' => Hash::make($user_pass),
                    ]);
                    if (config('custom_values.app_mode') == 'online') {
                    Mail::to($data['email'])->send(new AdminRegister($role_user));
                    }
                break;

            case 'doctor':
                $role_user = Doctor::create([
                    'user_id' => $user_id,
                    'personnel_id' => personnelID('doctors', "DOC", $data),
                    'title' => $data['title'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'raw_password' => $user_pass,
                    'password' => Hash::make($user_pass),
                    ]);
                    if (config('custom_values.app_mode') == 'online') {
                    Mail::to($data['email'])->send(new RegistrationMail($role_user));   
                    }                 
                break;

            case 'nurse':
                $role_user = Nurse::create([
                    'user_id' => $user_id,
                    'personnel_id' => personnelID('nurses', "NUR", $data),
                    'title' => $data['title'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'raw_password' => $user_pass,
                    'password' => Hash::make($user_pass),
                    ]);
                    if (config('custom_values.app_mode') == 'online') {
                    Mail::to($data['email'])->send(new RegistrationMail($role_user));   
                    }       
                break;

            case 'pharmacy':
                $role_user = Pharmacy::create([
                    'user_id' => $user_id,
                    'personnel_id' => personnelID('pharmacies', "PHA", $data),
                    'title' => $data['title'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'raw_password' => $user_pass,
                    'password' => Hash::make($user_pass),
                    ]);
                    if (config('custom_values.app_mode') == 'online') {
                    Mail::to($data['email'])->send(new RegistrationMail($role_user));   
                    }  
                break;

            case 'laboratory':
                $role_user = Laboratory::create([
                    'user_id' => $user_id,
                    'personnel_id' => personnelID('laboratories', "LAB", $data),
                    'title' => $data['title'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'raw_password' => $user_pass,
                    'password' => Hash::make($user_pass),
                    ]);
                    if (config('custom_values.app_mode') == 'online') {
                    Mail::to($data['email'])->send(new RegistrationMail($role_user));   
                    }  
                break;
            
            default:
            
                break;
        }
    return $user;
}
}
