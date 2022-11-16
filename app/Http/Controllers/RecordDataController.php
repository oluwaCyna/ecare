<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRecord\Comment;
use App\Models\PatientRecord\Diagnosis;
use App\Models\PatientRecord\Drug;
use App\Models\PatientRecord\DrugAvailable;
use App\Models\PatientRecord\Injection;
use App\Models\PatientRecord\Scan;
use App\Models\PatientRecord\ScanResult;
use App\Models\PatientRecord\Test;
use App\Models\PatientRecord\TestResult;
use App\Models\PatientRecord\Treatment;

class RecordDataController extends Controller
{
    //Delete Data
    public function deletePatientData (Request $request) {
        $key = collect($request->all())->keys()[2];
        
        switch ($key) {
            case 'comment_id':
                Comment::where('id', $request->comment_id)->firstorfail()->delete();
                break;

            case 'diagnosis_id':
                Diagnosis::where('id', $request->idiagnosis_idd)->firstorfail()->delete();
                break;
            
            case 'treatment_id':
                Treatment::where('id', $request->treatment_id)->firstorfail()->delete();
                break;

            case 'test_id':
                Test::where('id', $request->test_id)->firstorfail()->delete();
                break;

            case 'test_result_id':
                $pdf_delete = TestResult::where('id', $request->test_result_id)->firstorfail();
                unlink(public_path('test-result/'.$pdf_delete->test_result));
                $pdf_delete->delete();
                break;

            case 'scan_id':
                Scan::where('id', $request->scan_id)->firstorfail()->delete();
                break;

            case 'scan_result_id':
                $pdf_delete = ScanResult::where('id', $request->scan_result_id)->firstorfail();
                unlink(public_path('scan-result/'.$pdf_delete->scan_result));
                $pdf_delete->delete();
                break;
            
            case 'drug_id':
                Drug::where('id', $request->drug_id)->firstorfail()->delete();
                break;

            case 'drug_available_id':
                DrugAvailable::where('id', $request->drug_available_id)->firstorfail()->delete();
                break;

            case 'injection_id':
                Injection::where('id', $request->injection_id)->firstorfail()->delete();
                break;
        
            default:
                break;
        }
        return redirect()->back()->with("success", "Record deleted successfully.");
    }
}
