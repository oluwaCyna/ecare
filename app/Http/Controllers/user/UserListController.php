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

    // public function status(Request $request)
    // {
    //     $id = Auth::user()->id;
        
    //     User::where('id', $id)->update([
    //         'staus' => ,
            
    //     ]);

    //     Doctor::where('user_id', $id)->update([
    //         'title' => $request->title,
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'gender'=> $request->gender,
    //         'phone'=> $request->phone,
    //         'email' => $request->email,
    //         'address'=> $request->address,
    //         'education'=> $request->education,
    //         'specialization'=> $request->specialization,
    //         'speciality'=> $request->speciality,
    //         'language'=> $request->language,
    //         'bio'=> $request->bio,
    //         'image'=> $imageName,
    //     ]);
    //     $key = collect($request->all())->keys()[2];
        
    //     switch ($key) {
    //         case 'comment_id':
    //             Comment::where('id', $request->comment_id)->firstorfail()->delete();
    //             break;

    //         case 'diagnosis_id':
    //             Diagnosis::where('id', $request->idiagnosis_idd)->firstorfail()->delete();
    //             break;
            
    //         case 'treatment_id':
    //             Treatment::where('id', $request->treatment_id)->firstorfail()->delete();
    //             break;

    //         case 'test_id':
    //             Test::where('id', $request->test_id)->firstorfail()->delete();
    //             break;

    //         case 'test_result_id':
    //             $pdf_delete = TestResult::where('id', $request->test_result_id)->firstorfail();
    //             unlink(public_path('test-result/'.$pdf_delete->test_result));
    //             $pdf_delete->delete();
    //             break;

    //         case 'scan_id':
    //             Scan::where('id', $request->scan_id)->firstorfail()->delete();
    //             break;

    //         case 'scan_result_id':
    //             $pdf_delete = ScanResult::where('id', $request->scan_result_id)->firstorfail();
    //             unlink(public_path('scan-result/'.$pdf_delete->scan_result));
    //             $pdf_delete->delete();
    //             break;
            
    //         case 'drug_id':
    //             Drug::where('id', $request->drug_id)->firstorfail()->delete();
    //             break;

    //         case 'drug_available_id':
    //             DrugAvailable::where('id', $request->drug_available_id)->firstorfail()->delete();
    //             break;

    //         case 'injection_id':
    //             Injection::where('id', $request->injection_id)->firstorfail()->delete();
    //             break;
        
    //         default:
    //             break;
    //     }
    //     return redirect()->back()->with("success", "Record deleted successfully.");
    
    //     $doctor = Doctor::all();
    //     $nurse = Nurse::all();
    //     $pharmacy = Pharmacy::all();
    //     $laboratory = Laboratory::all();
    //     return view('user.personnel-list', compact('doctor', 'nurse', 'pharmacy', 'laboratory'));
    // }
}
