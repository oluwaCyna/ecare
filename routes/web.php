<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Display Credentials
Route::get('/credential', [App\Http\Controllers\DisplayController::class, 'display'])->name('credential');
Route::get('/credential/pdf', [App\Http\Controllers\DisplayController::class, 'createPDF']);


// Doctor
Route::group(['middleware' => ['doctor']], function () {
Route::get('/doctor', [App\Http\Controllers\user\DoctorController::class, 'dashboard'])->name('doctor');

Route::get('/doctor/update', [App\Http\Controllers\user\DoctorController::class, 'updateDoctor'])->name('doctor.update');
Route::put('/doctor/update', [App\Http\Controllers\user\DoctorController::class, 'saveUpdateDoctor'])->name('doctor.update.save');

Route::get('/doctor/doctor-list', [App\Http\Controllers\user\DoctorController::class, 'doctorListDoctor'])->name('doctor.doctor.list');

Route::get('/doctor/nurse-list', [App\Http\Controllers\user\DoctorController::class, 'nurseListDoctor'])->name('doctor.nurse.list');

Route::get('/doctor/laboratory-list', [App\Http\Controllers\user\DoctorController::class, 'laboratoryListDoctor'])->name('doctor.lab.list');

Route::get('/doctor/pharmacy-list', [App\Http\Controllers\user\DoctorController::class, 'pharmacyListDoctor'])->name('doctor.pharmacy.list');

// Patient Management
Route::get('/portal/general', [App\Http\Controllers\PatientManagementController::class, 'addRecordDoctor'])->name('general.record.create');
Route::post('/portal/general', [App\Http\Controllers\PatientManagementController::class, 'saveRecordDoctor'])->name('general.record.store');

});

// Nurse
Route::group(['middleware' => ['nurse']], function () {
Route::get('/nurse', [App\Http\Controllers\user\NurseController::class, 'dashboard'])->name('nurse');

Route::get('/nurse/update', [App\Http\Controllers\user\NurseController::class, 'updateNurse'])->name('nurse.update');
Route::put('/nurse/update', [App\Http\Controllers\user\NurseController::class, 'saveUpdateNurse'])->name('nurse.update.save');

Route::get('/nurse/check-record', [App\Http\Controllers\user\NurseController::class, 'checkRecordNurse'])->name('nurse.check');
Route::post('/nurse/check-record', [App\Http\Controllers\user\NurseController::class, 'loadCheckRecordNurse'])->name('nurse.check.load');

Route::get('/nurse/doctor-list', [App\Http\Controllers\user\NurseController::class, 'doctorListNurse'])->name('nurse.doctor.list');

// Patient Management
Route::get('/portal/add-patient', [App\Http\Controllers\PatientManagementController::class, 'addPatientPersonal'])->name('patient.personal.create');
Route::post('/portal/add-patient', [App\Http\Controllers\PatientManagementController::class, 'savePatientPersonal'])->name('patient.personal.store');

Route::get('/portal/id-check', [App\Http\Controllers\PatientManagementController::class, 'iDPatient'])->name('patient.id.check');
Route::post('/portal/id-check', [App\Http\Controllers\PatientManagementController::class, 'iDPatientLoad'])->name('patient.id.check.load');
Route::get('/portal/update-patient', [App\Http\Controllers\PatientManagementController::class, 'updatePatient'])->name('patient.update');
Route::put('/portal/update-patient', [App\Http\Controllers\PatientManagementController::class, 'saveUpdatePatient'])->name('patient.update.save');

Route::get('/portal/upload-test/{appearance_id}', [App\Http\Controllers\PatientManagementController::class, 'uploadTestNurse'])->name('upload.test.nurse');
Route::post('/portal/upload-test', [App\Http\Controllers\PatientManagementController::class, 'saveUploadTestNurse'])->name('upload.test.nurse.store');

Route::get('/portal/upload-scan/{appearance_id}', [App\Http\Controllers\PatientManagementController::class, 'uploadScanNurse'])->name('upload.scan.nurse');
Route::post('/portal/upload-scan', [App\Http\Controllers\PatientManagementController::class, 'saveUploadScanNurse'])->name('upload.scan.nurse.store');

Route::get('/portal/daily/{record_id}', [App\Http\Controllers\PatientManagementController::class, 'addRecordNurse'])->name('daily.record.create');
Route::post('/portal/daily', [App\Http\Controllers\PatientManagementController::class, 'saveRecordNurse'])->name('daily.record.store');

Route::get('/portal/update-daily/{appearance_id}', [App\Http\Controllers\PatientManagementController::class, 'updateRecordNurse'])->name('daily.record.update');
Route::post('/portal/update-daily', [App\Http\Controllers\PatientManagementController::class, 'saveUpdateRecordNurse'])->name('daily.record.update.store');
});

// Laboratory
Route::group(['middleware' => ['laboratory']], function () {
Route::get('/laboratory', [App\Http\Controllers\user\LaboratoryController::class, 'dashboard'])->name('laboratory');

Route::get('/laboratory/nurse-list', [App\Http\Controllers\user\LaboratoryController::class, 'nurseListLaboratory'])->name('laboratory.nurse.list');

Route::get('/laboratory/laboratory-list', [App\Http\Controllers\user\LaboratoryController::class, 'laboratoryListLaboratory'])->name('laboratory.lab.list');

Route::get('/laboratory/update', [App\Http\Controllers\user\LaboratoryController::class, 'updateLaboratory'])->name('laboratory.update');
Route::put('/laboratory/update', [App\Http\Controllers\user\LaboratoryController::class, 'saveUpdateLaboratory'])->name('laboratory.update.save');

Route::get('/laboratory/add', [App\Http\Controllers\user\LaboratoryController::class, 'addLaboratory'])->name('laboratory.add');
});

// Pharmacy
Route::group(['middleware' => ['pharmacy']], function () {
Route::get('/pharmacy', [App\Http\Controllers\user\PharmacyController::class, 'dashboard'])->name('pharmacy');

Route::get('/pharmacy/nurse-list', [App\Http\Controllers\user\PharmacyController::class, 'nurseListPharmacy'])->name('pharmacy.nurse.list');

Route::get('/pharmacy/pharmacy-list', [App\Http\Controllers\user\PharmacyController::class, 'pharmacyListPharmacy'])->name('pharmacy.pharmacy.list');

Route::get('/pharmacy/update', [App\Http\Controllers\user\PharmacyController::class, 'updatePharmacy'])->name('pharmacy.update');
Route::put('/pharmacy/update', [App\Http\Controllers\user\PharmacyController::class, 'saveUpdatePharmacy'])->name('pharmacy.update.save');

Route::get('/pharmacy/add', [App\Http\Controllers\user\PharmacyController::class, 'addPharmacy'])->name('pharmacy.add');
});

// Patient
Route::get('/patient', [App\Http\Controllers\user\PatientController::class, 'dashboard'])->name('patient');

Route::get('/patient/records', [App\Http\Controllers\user\PatientController::class, 'recordsPatient'])->name('patient.records');

Route::group(['middleware' => ['doctornurse']], function () {
// Patient Management
Route::get('/patient-portal', [App\Http\Controllers\PatientManagementController::class, 'portal'])->name('portal');

Route::get('/portal/update/{appearance_id}', [App\Http\Controllers\PatientManagementController::class, 'updateRecordDoctor'])->name('general.record.update');
Route::post('/portal/update', [App\Http\Controllers\PatientManagementController::class, 'saveUpdateRecordDoctor'])->name('general.record.update.store');

Route::get('/portal/patient', [App\Http\Controllers\PatientManagementController::class, 'patientList'])->name('patient.list');
Route::get('/portal/patient/{patient_id}', [App\Http\Controllers\PatientManagementController::class, 'patientRecord'])->name('patient.list.record');

Route::get('/portal/check-record', [App\Http\Controllers\PatientManagementController::class, 'checkRecord'])->name('patient.check');
Route::post('/portal/check-record', [App\Http\Controllers\PatientManagementController::class, 'loadCheckRecord'])->name('patient.check.load');

Route::get('/portal/check-record/pdf', [App\Http\Controllers\PatientManagementController::class, 'createPDF']); 
});

Route::group(['middleware' => ['auth']], function () {
//Delete Patient Record data
Route::delete('/patient-data/delete', [App\Http\Controllers\RecordDataController::class, 'deletePatientData'])->name('data.delete');

// Message
Route::get('/message/{user_id}', [App\Http\Controllers\MessageController::class, 'sendMessage'])->name('message');
Route::post('/message', [App\Http\Controllers\MessageController::class, 'saveMessage'])->name('message.store');

//Notifications
Route::get('/notification', [App\Http\Controllers\MessageController::class, 'sendNotification'])->name('notification');
Route::get('/notification-listen', [App\Http\Controllers\MessageController::class, 'listenNotification'])->name('notification.listen');

Route::get('/personnel-list', [App\Http\Controllers\user\UserListController::class, 'userList'])->name('user.list');

// Onlin Status
Route::put('/status', [App\Http\Controllers\UserListController::class, 'status'])->name('status');
});

// Admin
Route::group(['middleware' => ['dashboard']], function () {
Route::get('/administrator', [App\Http\Controllers\user\AdminController::class, 'dashboard'])->name('admin');
});
Route::get('/password', [App\Http\Controllers\user\AdminController::class, 'password'])->name('password');
Route::post('/password', [App\Http\Controllers\user\AdminController::class, 'checkPassword'])->name('password.check');


Route::group(['middleware' => ['personnel']], function () {
Route::get('/add-personnel', [App\Http\Controllers\user\AdminController::class, 'add'])->name('admin.add');
});
Route::get('/personnel', [App\Http\Controllers\user\AdminController::class, 'personnel'])->name('personnel');
Route::post('/personnel', [App\Http\Controllers\user\AdminController::class, 'checkPersonnel'])->name('personnel.check');

Route::group(['middleware' => ['admin-update']], function () {
Route::get('/admin-update', [App\Http\Controllers\user\AdminController::class, 'editAdmin'])->name('admin.edit');
Route::put('/admin-update', [App\Http\Controllers\user\AdminController::class, 'saveEditAdmin'])->name('admin.store');
});
Route::get('/admin-pass', [App\Http\Controllers\user\AdminController::class, 'updateAdmin'])->name('update.admin');
Route::post('/admin-pass', [App\Http\Controllers\user\AdminController::class, 'checkAdmin'])->name('admin.check');

Route::get('/logout', [App\Http\Controllers\user\AdminController::class, 'logout'])->name('admin.logout');
