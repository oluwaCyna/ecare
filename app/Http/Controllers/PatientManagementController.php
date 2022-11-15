<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientRecord\Drip;
use App\Models\PatientRecord\Drug;
use App\Models\PatientRecord\Scan;
use App\Models\PatientRecord\Test;
use Illuminate\Support\Facades\DB;
use App\Models\PatientRecord\Record;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PatientRequest;
use App\Models\PatientRecord\Comment;
use App\Http\Requests\IdPatientRequest;
use App\Models\PatientRecord\Diagnosis;
use App\Models\PatientRecord\Injection;
use App\Models\PatientRecord\Appearance;
use App\Http\Requests\PatientUpdateRequest;
use App\Http\Requests\Record\GeneralRequest;
use App\Http\Requests\Record\DoctorGeneralUpdaterequest;

class PatientManagementController extends Controller
{
    //Manage Patient
    public function portal()
    {
        return view('manage-patient.patient-management');
    }

    // View Patient Record
    public function checkRecord()
    {
        return view('manage-patient.check-record');
    }

    // Load Patient Record
    public function loadCheckRecord(IdPatientRequest $request)
    {
        session(['patient_key' => $request->patient_key]);
        // $patient_data = DB::table('patients')->where('patient_key', $request->patient_key)->first();
        $patient_data = Patient::where('patient_key', $request->patient_key)->first();
        // dd($patient_data->record[0]->appearance[0]->comment);
        if (empty($patient_data)) {
            return redirect()->back()->with('error', 'Patient Key not recognized');
        }else {
            return view('manage-patient.record', compact('patient_data'));
        }
    }

    // Add Patient
    public function addPatientPersonal()
    {
        return view('manage-patient.add-patient');
    }

    // Add Patient Save
    public function savePatientPersonal(PatientRequest $request)
    {
        $active_patient = DB::table('patients')->get()->count() + 1;
        if ($active_patient > 0 && $active_patient < 10) {
            $active_patient = '00'.$active_patient;
        }else if ($active_patient > 9 && $active_patient < 100) {
            $active_patient = '0'.$active_patient;
        }else {
            $active_patient = $active_patient;
        }

        $patient_key = "PAT".strtoupper(substr($request->first_name,0,1).substr($request->last_name,0,1)).$active_patient;
        $imageName = "";

        if($request->image != null && $request->image->isValid())
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('patient-picture'), $imageName);
        }

        Patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender'=> $request->gender,
            'phone'=> $request->phone,
            'email' => $request->email,
            'address'=> $request->address,
            'height'=> $request->height,
            'blood_group'=> $request->blood_group,
            'image'=> $imageName,
            'patient_key'=> $patient_key
        ]);
        // session(['patient_key' => $patient_key]);
        $patient_data = DB::table('patients')->where('patient_key', $patient_key)->first();
        redirect()->back()->with('success', 'Patient sucessfully added');
        return view('manage-patient.record', compact('patient_data'));
    }

    // Update Patient
    public function iDPatient()
    {
        return view('manage-patient.id-patient');
    }

    public function iDPatientLoad(IdPatientRequest $request)
    {
        // session(['patient_key' => $request->patient_key]);
        $patient_data = DB::table('patients')->where('patient_key', $request->patient_key)->first();
        if (empty($patient_data)) {
            return redirect()->back()->with('error', 'Patient Key not recognized');
        }else {
            return view('manage-patient.edit-patient', compact('patient_data'));
        }
        return redirect('/portal/update-patient');
    }

    public function updatePatient(IdPatientRequest $request)
    {
        // $patient_key = session('patient_key');
        $patient_data = DB::table('patients')->where('patient_key', $request->patient_key)->first();
            return view('manage-patient.edit-patient', compact('patient_data'));
    }

    // Update Patient Save
    public function saveUpdatePatient(PatientUpdateRequest $request)
    {
        $imageName = "";
        if($request->image != null && $request->image->isValid())
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('patient-picture'), $imageName);
        }

        Patient::where('patient_key', $request->patient_key)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender'=> $request->gender,
            'phone'=> $request->phone,
            'email' => $request->email,
            'address'=> $request->address,
            'height'=> $request->height,
            'blood_group'=> $request->blood_group,
            'image'=> $imageName,
        ]);
        return redirect()->back()->with('success', 'Patient data has been updated successfuly');
    }

    // View Active Patient
    public function activePatient()
    {
        return view('manage-patient.active-patient');
    }

     // Generate PDF
     public function createPDF() {
        // retreive all records from auth
        $patient_key = session('patient_key');
        $patient_data = DB::table('patients')->where('patient_key', $patient_key)->first();
        // share data to view
        $pdf = PDF::loadView('patient-pdf',compact(['patient_data']));
        // download PDF file with download method
        return $pdf->download('patient_credential.pdf');
      }

    // Add Patient General Record by Doctor
    public function addRecordDoctor()
    {
        return view('manage-patient.doctor.add-record');
    }

    // Save Patient General Record by Doctor
    public function saveRecordDoctor(GeneralRequest $request)
    {
        $id = Auth::user()->id;
        $personnel = DB::table('doctors')->where('user_id', $id)->first();

        $patient_data = DB::table('patients')->where('patient_key', $request->patient_key)->first();
        $date = date("l, jS F, Y. h:i:s A");
        $title = $patient_data->first_name.$patient_data->last_name." - ".$date;
        Record::create([
            'patient_id' => $patient_data->id,
            'patient_key' => $request->patient_key,
            'title' => $title,
            'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
            'personnel_id' => $personnel->personnel_id
        ]);

        $patient_record = DB::table('records')->where('title', $title)->first();

        Appearance::create([
            'record_id' => $patient_record->id,
            'record_title' => $patient_record->title,
            'title' => "General",
            'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
            'personnel_id' => $personnel->personnel_id
        ]);

        $patient_appearance = Appearance::where('record_id', $patient_record->id)->where('title', 'General')->first();
        if (!empty($request->comment)) {
        $comment = explode("|", $request->comment);
        foreach ($comment as $comment) {
            Comment::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'comment' => $comment,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->diagnosis)) {
        $diagnosis = explode("|", $request->diagnosis);
        foreach ($diagnosis as $diagnosis) {
            Diagnosis::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'diagnosis' => $diagnosis,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->test)) {
        $test = explode(",", $request->test);
        foreach ($test as $test) {
            Test::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'test' => $test,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->scan)) {
        $scan = explode(",", $request->scan);
        foreach ($scan as $scan) {
            Scan::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'scan' => $scan,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->drip)) {
        $drip = explode(",", $request->drip);
        foreach ($drip as $drip) {
            Drip::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'drip' => $drip,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->drug)) {
        $drug = explode(",", $request->drug);
        foreach ($drug as $drug) {
            Drug::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'drug' => $drug,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->injection)) {
        $injection = explode(",", $request->injection);
        foreach ($injection as $injection) {
            Injection::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'injection' => $injection,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        return view('manage-patient.doctor.add-record')->with('success', 'Patient record has been saved successfuly');
    }

    // Edit Patient General Record by Doctor
    public function updateRecordDoctor($appearance_id)
    {
        $patient_record = $comment_array = $diagnosis_array = $test_array = $scan_array = $drip_array = $drug_array = $injection_array = [];

        $comment = Comment::where('appearance_id', $appearance_id)->get();
        if ($comment->count() > 0) {
        foreach ($comment as $comment) {
            array_push($comment_array, $comment->comment);
        };
            $comment = implode("|", $comment_array);
        }else {
            $comment = "";
        } 

        $diagnosis = Diagnosis::where('appearance_id', $appearance_id)->get();
        if ($diagnosis->count() > 0) {
        foreach ($diagnosis as $diagnosis) {
            array_push($diagnosis_array, $diagnosis->diagnosis);
        };
            $diagnosis = implode("|", $diagnosis_array);
        }else {
            $diagnosis = "";
        }

        $test = Test::where('appearance_id', $appearance_id)->get();
       
        if ($test->count() > 0) {
        foreach ($test as $test) {
            array_push($test_array, $test->test);
        };
        $test = implode(",", $test_array);
        }else {
            $test = "";
        }

        $scan = Scan::where('appearance_id', $appearance_id)->get();
        if ($scan->count() > 0) {
        foreach ($scan as $scan) {
            array_push($scan_array, $scan->scan);
        };
        $scan = implode(",", $scan_array);
        }else {
            $scan = "";
        }

        $drip = Drip::where('appearance_id', $appearance_id)->get();
        if ($drip->count() > 0) {
        foreach ($drip as $drip) {
            array_push($drip_array, $drip->drip);
        };
        $drip = implode(",", $drip_array);
        }else {
            $drip = "";
        }

        $drug = Drug::where('appearance_id', $appearance_id)->get();
        if ($drug->count() > 0) {
        foreach ($drug as $drug) {
            array_push($drug_array, $drug->drug);
        };
        $drug = implode(",", $drug_array);
        }else {
            $drug = "";
        }

        $injection = Injection::where('appearance_id', $appearance_id)->get();
        if ($injection->count() > 0) {
        foreach ($injection as $injection) {
            array_push($injection_array, $injection->injection);
        };
        $injection = implode(",", $injection_array);
        }else {
            $injection = "";
        }

        $patient_record['comment'] = $comment;
        $patient_record['diagnosis'] = $diagnosis;
        $patient_record['test'] = $test;
        $patient_record['scan'] = $scan;
        $patient_record['drip'] = $drip;
        $patient_record['drug'] = $drug;
        $patient_record['injection'] = $injection;
        $patient_record['appearance_id'] = $appearance_id;

        return view('manage-patient.doctor.edit-record', compact('patient_record'));
    }

    // Edit Patient General Record by Doctor
    public function saveUpdateRecordDoctor(DoctorGeneralUpdaterequest $request)
    {
        // Update
        if (!empty($request->comment)) {
        $comment = explode("|", $request->comment);
        foreach ($comment as $comment) {
            Comment::where('appearance_id', $request->appearance_id)->update([
                'comment' => $comment,
            ]);
        }
        }

        if (!empty($request->diagnosis)) {
        $diagnosis = explode("|", $request->diagnosis);
        foreach ($diagnosis as $diagnosis) {
            Diagnosis::where('appearance_id', $request->appearance_id)->update([
                'diagnosis' => $diagnosis,
            ]);
        }
        }

        if (!empty($request->test)) {
        $test = explode(",", $request->test);
        foreach ($test as $test) {
            Test::where('appearance_id', $request->appearance_id)->update([
                'test' => $test,
            ]);
        }
        }

        if (!empty($request->scan)) {
        $scan = explode(",", $request->scan);
        foreach ($scan as $scan) {
            Scan::where('appearance_id', $request->appearance_id)->update([
                'scan' => $scan,
            ]);
        }
        }

        if (!empty($request->drip)) {
        $drip = explode(",", $request->drip);
        foreach ($drip as $drip) {
            Drip::where('appearance_id', $request->appearance_id)->update([
                'drip' => $drip,
            ]);
        }
        }

        if (!empty($request->drug)) {
        $drug = explode(",", $request->drug);
        foreach ($drug as $drug) {
            Drug::where('appearance_id', $request->appearance_id)->update([
                'drug' => $drug,
            ]);
        }
        }

        if (!empty($request->injection)) {
        $injection = explode(",", $request->injection);
        foreach ($injection as $injection) {
            Injection::where('appearance_id', $request->appearance_id)->update([
                'injection' => $injection,
            ]);
        }
        }

        //Add New
        $id = Auth::user()->id;
        $personnel = DB::table('doctors')->where('user_id', $id)->first();

        // $date = date("l, jS F, Y. h:i:s A");

        $patient_appearance = Appearance::where('id', $request->appearance_id)->first();
        if (!empty($request->new_comment)) {
        $comment = explode("|", $request->comment);
        foreach ($comment as $comment) {
            Comment::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'comment' => $comment,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->new_diagnosis)) {
        $diagnosis = explode("|", $request->diagnosis);
        foreach ($diagnosis as $diagnosis) {
            Diagnosis::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'diagnosis' => $diagnosis,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->new_test)) {
        $test = explode(",", $request->test);
        foreach ($test as $test) {
            Test::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'test' => $test,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->new_scan)) {
        $scan = explode(",", $request->scan);
        foreach ($scan as $scan) {
            Scan::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'scan' => $scan,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->new_drip)) {
        $drip = explode(",", $request->drip);
        foreach ($drip as $drip) {
            Drip::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'drip' => $drip,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->new_drug)) {
        $drug = explode(",", $request->drug);
        foreach ($drug as $drug) {
            Drug::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'drug' => $drug,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }

        if (!empty($request->new_injection)) {
        $injection = explode(",", $request->injection);
        foreach ($injection as $injection) {
            Injection::create([
                'appearance_id' => $patient_appearance->id,
                'appearance_title' => $patient_appearance->title,
                'injection' => $injection,
                'personnel_name' => $personnel->title." ".$personnel->first_name." ".$personnel->last_name,
                'personnel_id' => $personnel->personnel_id
            ]);
        }
        }
        $patient_data = $patient_appearance->record->patient->first();

        return view('manage-patient.record', compact('patient_data'));
    }

    // Edit Patient General Record by Nurse
    public function updateGeneralNurse()
    {
        return view('manage-patient.nurse.edit-record');
    }

    // Edit Patient General Record by Nurse
    public function saveupdateGeneralNurse()
    {
        return view('manage-patient.nurse.edit-record', compact('patient_data')); //stopped here
    }

    // Add Patient Daily Record by Nurse
    public function addRecordNurse()
    {
        return view('manage-patient.doctor.add-record');
    }

    // Save Patient Daily Record by Nurse
    public function saveRecordNurse()
    {
        return view('manage-patient.check-record', compact('patient_data'));
    }

    // Edit Patient Daily Record by Nurse
    public function updateRecordNurse()
    {
        return view('manage-patient.doctor.add-record');
    }

    // Edit Patient Daily Record by Nurse
    public function saveUpdateRecordNurse()
    {
        return view('manage-patient.check-record', compact('patient_data'));
    }

}
