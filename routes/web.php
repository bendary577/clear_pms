
  
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


//--------------------------------- public routes ---------------------------
//-------- home ---------------
Route::get('/', function () {
    if(Auth::check()){
        return redirect('/profile');
    }else{
        return view('home.home');
    }
})->name('home');
Route::post('/contactus', [App\Http\Controllers\HomeController::class, 'contactus'])->name('contactus');

//--------- lang ----------------
Route::get('/language/{lang}', [App\Http\Controllers\LocalizationController::class, 'index'])->name('change.language');

//-------- auth ------------
Route::get('/login', [App\Http\Controllers\AuthenticationController::class, 'login'])->name('login');
Route::post('/authenticate', [App\Http\Controllers\AuthenticationController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [App\Http\Controllers\AuthenticationController::class, 'register'])->name('register');
Route::get('/forgot-password', [App\Http\Controllers\AuthenticationController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/send-code', [App\Http\Controllers\AuthenticationController::class, 'forgotPasswordSendCode'])->name('send.code');
Route::get('/submit-code', [App\Http\Controllers\AuthenticationController::class, 'submitForgotPasswordCode'])->name('submit.code');
Route::post('/activate-code', [App\Http\Controllers\AuthenticationController::class, 'activateForgotPasswordCode'])->name('activate.code');
Route::get('/reset-password', [App\Http\Controllers\AuthenticationController::class, 'resetPassword'])->name('reset.password');
Route::post('/submit-password', [App\Http\Controllers\AuthenticationController::class, 'submitResetPassword'])->name('submit.password');
Route::post('/storeUser', [App\Http\Controllers\AuthenticationController::class, 'storeUser'])->name('storeUser');
Route::get('/request_admin_activation', [App\Http\Controllers\AuthenticationController::class, 'activateAdminAccountView'])->name('request.admin.activation');
Route::post('/{email}/activate_admin', [App\Http\Controllers\AuthenticationController::class, 'activateAdminAccount'])->name('activate.admin');

//--------------------------------- protected routes ---------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile.dashboard.dashboard_profile');
    })->name('profile');
    Route::get('/logout', [App\Http\Controllers\AuthenticationController::class, 'logout'])->name('logout');

    //-------- admin dashboard ------------
    Route::middleware('role:admin')->group(function () {

        Route::prefix('admin_dashboard')->group(function () {
            Route::get('/', [App\Http\Controllers\AdminProfileController::class, 'welcome'])->name('admin.dashboard');
            Route::get('/edit_profile', [App\Http\Controllers\AdminProfileController::class, 'edit'])->name('admin.edit.profile');
            Route::post('/update_profile', [App\Http\Controllers\AdminProfileController::class, 'update'])->name('admin.update.profile');
            Route::get('/{id}/block', [App\Http\Controllers\AdminProfileController::class, 'block'])->name('admin.block.account');
            Route::get('/{id}/unblock', [App\Http\Controllers\AdminProfileController::class, 'unblock'])->name('admin.unblock.account');

            Route::prefix('registration_requests')->group(function () {
                Route::get('/', [App\Http\Controllers\AdminProfileController::class, 'getRegistrationRequests'])->name('admin.registration.requests');
                Route::get('/{id}/activate', [App\Http\Controllers\AdminProfileController::class, 'activate'])->name('admin.activate.registration.requests');
                Route::get('/{id}/generate_code', [App\Http\Controllers\AdminProfileController::class, 'generateAdminCode'])->name('admin.generate.admin.code');
                Route::get('/{id}/delete', [App\Http\Controllers\AdminProfileController::class, 'delete'])->name('admin.delete.registration.requests');
            });

            Route::prefix('admins')->group(function () {
                Route::get('/', [App\Http\Controllers\AdminProfileController::class, 'index'])->name('admin.admins');
                Route::get('/{id}/handle_super_admin', [App\Http\Controllers\AdminProfileController::class, 'handleSuperAdmin'])->name('admin.handle.super.admin');
                Route::get('/{id}/cancel_handle_super_admin', [App\Http\Controllers\AdminProfileController::class, 'cancelHandleSuperAdmin'])->name('admin.cancel.handle.super.admin');
                Route::get('/confirm_authorities_request', [App\Http\Controllers\AdminProfileController::class, 'confirmHandleAuthoritiesRequest'])->name('admin.confirm.authorities.request');
                Route::get('/cancel_authorities_request', [App\Http\Controllers\AdminProfileController::class, 'cancelHandleAuthoritiesRequest'])->name('admin.cancel.authorities.request');
            });

            Route::prefix('doctors')->group(function () {
                Route::get('/', [App\Http\Controllers\DoctorProfileController::class, 'index'])->name('admin.doctors');
                Route::get('/delete/{id}', [App\Http\Controllers\DoctorProfileController::class, 'destroy'])->name('admin.delete.doctor');
            });

            Route::prefix('receptionists')->group(function () {
                Route::get('/', [App\Http\Controllers\ReceptionistProfileController::class, 'index'])->name('admin.receptionists');
                Route::get('/edit/{id}', [App\Http\Controllers\AdminProfileController::class, 'editReceptionist'])->name('admin.edit.receptionist');
                Route::post('/update/{id}', [App\Http\Controllers\AdminProfileController::class, 'updateReceptionist'])->name('admin.update.receptionist');
                Route::get('/delete/{id}', [App\Http\Controllers\ReceptionistProfileController::class, 'destroy'])->name('admin.delete.receptionist');
            
            });
            
            Route::prefix('medical_specialties')->group(function () {
                Route::get('/', [App\Http\Controllers\MedicalSpecialityController::class, 'index'])->name('admin.medical.specialities');
                Route::get('/add', [App\Http\Controllers\MedicalSpecialityController::class, 'create'])->name('admin.add.medical.speciality');
                Route::post('/store', [App\Http\Controllers\MedicalSpecialityController::class, 'store'])->name('admin.store.medical.speciality');
                Route::get('/edit/{id}', [App\Http\Controllers\MedicalSpecialityController::class, 'edit'])->name('admin.edit.medical.speciality');
                Route::post('/update/{id}', [App\Http\Controllers\MedicalSpecialityController::class, 'update'])->name('admin.update.medical.speciality');
                Route::get('/delete/{id}', [App\Http\Controllers\MedicalSpecialityController::class, 'destroy'])->name('admin.delete.medical.speciality');
            });

        });
    
    });

    //-------- doctors dashboard ------------
    Route::middleware('role:doctor')->group(function () {
    
        Route::prefix('doctor_dashboard')->group(function () {
        Route::get('/', [App\Http\Controllers\DoctorProfileController::class, 'welcome'])->name('doctor.dashboard');
        Route::get('/{id}/file_history', [App\Http\Controllers\DoctorProfileController::class, 'show'])->name('doctor.doctor.file');
        Route::get('/edit_profile', [App\Http\Controllers\DoctorProfileController::class, 'edit'])->name('doctor.edit.profile');
        Route::post('/update_profile', [App\Http\Controllers\DoctorProfileController::class, 'update'])->name('doctor.update.profile');
        Route::get('/', [App\Http\Controllers\DoctorProfileController::class, 'welcome'])->name('doctor.dashboard');
        Route::get('{appointment_id}/check_perscreption', [App\Http\Controllers\PerscreptionController::class, 'show'])->name('doctor.appointment.check.perscreption');

            Route::prefix('clinic')->group(function () {
                
                Route::get('/', [App\Http\Controllers\ClinicController::class, 'show'])->name('doctor.clinic');
                Route::get('/add', [App\Http\Controllers\ClinicController::class, 'create'])->name('doctor.add.clinic');
                Route::post('/store', [App\Http\Controllers\ClinicController::class, 'store'])->name('doctor.store.clinic');
                Route::get('/edit_hours', [App\Http\Controllers\ClinicController::class, 'edit'])->name('doctor.edit.clinic_hours');
                Route::post('/update_hours', [App\Http\Controllers\ClinicController::class, 'update'])->name('doctor.update.clinic_hours');
                Route::get('/delete', [App\Http\Controllers\ClinicController::class, 'destroy'])->name('doctor.delete.clinic_hours');
                Route::post('/{appointment_id}/store_diagnose}', [App\Http\Controllers\DiagnoseController::class, 'store'])->name('doctor.add.diagnose');
                Route::get('/{appointment_id}/end_visit}', [App\Http\Controllers\AppointmentController::class, 'registerPatientLeavingTime'])->name('doctor.end.visit');

                Route::prefix('/patients')->group(function () {
                    Route::get('/', [App\Http\Controllers\PatientController::class, 'getClinicPatients'])->name('doctor.clinic.patients');
                    Route::get('/{id}/patient_file', [App\Http\Controllers\PatientController::class, 'getPatientFileHistory'])->name('doctor.clinic.patient_file');
                    Route::get('/{id}/edit_medicines/{medicineId}', [App\Http\Controllers\MedicineController::class, 'edit'])->name('doctor.clinic.edit.medicines');
                    Route::post('/{id}/update_medicines/{medicineId}', [App\Http\Controllers\MedicineController::class, 'update'])->name('doctor.clinic.update.medicines');
                });
            });
        });
    });

    //-------- receptionist dashboard ------------
    Route::middleware('role:receptionist')->group(function () {

        Route::prefix('receptionist_dashboard')->group(function () {
            Route::get('/', [App\Http\Controllers\ReceptionistDashboardController::class, 'welcome'])->name('receptionist.dashboard');
            Route::get('/patients_statistics', [App\Http\Controllers\ReceptionistDashboardController::class, 'patientsStatistics'])->name('receptionist.patients.statistics');
            Route::get('/clinics_statistics', [App\Http\Controllers\ReceptionistDashboardController::class, 'clinicsStatistics'])->name('receptionist.clinics.statistics');
            Route::get('/medical_insights', [App\Http\Controllers\ReceptionistDashboardController::class, 'medicalInsights'])->name('receptionist.medical.insights');
            Route::get('/system_statistics', [App\Http\Controllers\ReceptionistDashboardController::class, 'systemStatistics'])->name('receptionist.system.statistics');

            Route::get('/edit_profile', [App\Http\Controllers\ReceptionistProfileController::class, 'edit'])->name('receptionist.edit.profile');
            Route::post('/update_profile', [App\Http\Controllers\ReceptionistProfileController::class, 'update'])->name('receptionist.update.profile');
            Route::get('/appointments', [App\Http\Controllers\AppointmentController::class, 'index'])->name('receptionist.appointments');
            Route::get('/clinics', [App\Http\Controllers\ClinicController::class, 'getClinicsView'])->name('receptionist.clinics');
            Route::get('/adults_clinics', [App\Http\Controllers\ClinicController::class, 'getAdultsClinics'] )->name('receptionist.adults.clinics');
            Route::get('/children_clinics', [App\Http\Controllers\ClinicController::class, 'getChildrenClinics'] )->name('receptionist.children.clinics');
            Route::get('/doctors', [App\Http\Controllers\DoctorProfileController::class, 'indexReceptionist'] )->name('receptionist.doctors');
            Route::get('/{id}/doctor_schedules', [App\Http\Controllers\DoctorProfileController::class, 'schedules'] )->name('receptionist.doctor.schedules');

            Route::prefix('system-diagnoses')->group(function () {
                Route::get('/list', [App\Http\Controllers\SystemDiagnosesController::class, 'index'])->name('receptionist.system.diagnoses.list');
                Route::get('/add_diagnose', [App\Http\Controllers\SystemDiagnosesController::class, 'create'] )->name('receptionist.add.diagnose');
                Route::get('/store_diagnose', [App\Http\Controllers\SystemDiagnosesController::class, 'store'] )->name('receptionist.store.diagnose');
                Route::get('/{id}/edit', [App\Http\Controllers\SystemDiagnosesController::class, 'edit'] )->name('receptionist.edit.diagnose');
                Route::post('/{id}/update', [App\Http\Controllers\SystemDiagnosesController::class, 'update'] )->name('receptionist.update.diagnose');
                Route::get('/{id}/delete', [App\Http\Controllers\SystemDiagnosesController::class, 'delete'])->name('receptionist.delete.diagnose');
            });

            Route::prefix('system-medicines')->group(function () {
                Route::get('/list', [App\Http\Controllers\SystemMedicineController::class, 'index'])->name('receptionist.medicines.list');
                Route::get('/add', [App\Http\Controllers\SystemMedicineController::class, 'create'] )->name('receptionist.add.medicine');
                Route::post('/store', [App\Http\Controllers\SystemMedicineController::class, 'store'] )->name('receptionist.store.medicine');
                Route::get('/{id}/edit', [App\Http\Controllers\SystemMedicineController::class, 'edit'] )->name('receptionist.edit.medicine');
                Route::post('/{id}/update', [App\Http\Controllers\SystemMedicineController::class, 'update'] )->name('receptionist.update.medicine');
                Route::get('/{id}/delete', [App\Http\Controllers\SystemMedicineController::class, 'delete'])->name('receptionist.delete.medicine');
            });

            Route::prefix('data-operations')->group(function () {
                Route::get('/import-excel-view', [App\Http\Controllers\DataOperationsController::class, 'getImportExcelView'])->name('receptionist.import.excel.view');
                Route::post('/import-excel', [App\Http\Controllers\DataOperationsController::class, 'importExcel'])->name('receptionist.import.excel');
                Route::get('/export-excel', [App\Http\Controllers\DataOperationsController::class, 'exportExcel'])->name('receptionist.export.excel');
            });

            Route::prefix('patients')->group(function () {
                Route::get('/', [App\Http\Controllers\PatientController::class, 'indexReceptionist'])->name('receptionist.patients');
                Route::get('/list', [App\Http\Controllers\PatientController::class, 'index'])->name('receptionist.patients.list');
                Route::post('/search', [App\Http\Controllers\SearchController::class, 'elasticSearch'])->name('receptionist.patients.search');
                Route::get('/add', [App\Http\Controllers\PatientController::class, 'create'])->name('receptionist.add.patient');
                Route::post('/store', [App\Http\Controllers\PatientController::class, 'store'])->name('receptionist.store.patient');
                Route::get('{id}/delete', [App\Http\Controllers\PatientController::class, 'delete'])->name('receptionist.delete.patient');
                Route::get('{id}/edit', [App\Http\Controllers\PatientController::class, 'edit'])->name('receptionist.edit.patient');
                Route::post('{id}/update', [App\Http\Controllers\PatientController::class, 'update'])->name('receptionist.update.patient');
                Route::get('/{id}/download_patient_card', [App\Http\Controllers\PatientController::class, 'downloadPatientCard'])->name('receptionist.patient.download.card');
                Route::get('/{id}/download_patient_sheet', [App\Http\Controllers\PatientController::class, 'downloadPatientSheet'])->name('receptionist.patient.download.sheet');
                Route::post('{id}/upload_medical_files', [App\Http\Controllers\FileController::class, 'uploadPatientMedicalFiles'])->name('receptionist.patient.upload.files');
                Route::get('{id}/patient_file', [App\Http\Controllers\PatientController::class, 'show'])->name('receptionist.patients.patient.file');
                Route::get('{appointment_id}/check_perscreption', [App\Http\Controllers\PerscreptionController::class, 'show'])->name('receptionist.appointment.check.perscreption');

                //receptionists visit
                Route::prefix('/visit')->group(function () {
                    Route::get('/list', [App\Http\Controllers\AppointmentController::class, 'listReceptionistVisits'])->name('receptionist.list.visits');
                    Route::get('/{patient_id}/start/{appointment_id}', [App\Http\Controllers\AppointmentController::class, 'startReceptionistVisit'])->name('receptionist.start.visit');
                    Route::get('/{patient_id}/start-immediately', [App\Http\Controllers\AppointmentController::class, 'startReceptionistVisitImmediately'])->name('receptionist.start.visit.immediately');
                    Route::post('/{appointment_id}/save-prescription', [App\Http\Controllers\PerscreptionController::class, 'store'])->name('receptionist.save.prescription');
                    Route::get('/{patient_id}/reserve', [App\Http\Controllers\AppointmentController::class, 'reserveReceptionistVisit'])->name('receptionist.reserve.visit');
                    Route::post('{patient_id}/register', [App\Http\Controllers\AppointmentController::class, 'registerReceptionistVisit'])->name('receptionist.register.visit');
                    Route::get('{appointment_id}/end', [App\Http\Controllers\AppointmentController::class, 'endReceptionistVisit'])->name('receptionist.end.visit');
                });

                //doctor visits
                Route::prefix('/{id}/new_appointment')->group(function () {
                    Route::get('/', [App\Http\Controllers\AppointmentController::class, 'create'])->name('receptionist.patients.new.appointment');
                    Route::get('/adults_clinics', [App\Http\Controllers\AppointmentController::class, 'getAdultsClinicsAppointments'])->name('adults.clinic.patient.appointment');
                    Route::get('/children_clinics', [App\Http\Controllers\AppointmentController::class, 'getChildrenClinicsAppointments'])->name('children.clinic.patient.appointment');
                    Route::get('/{clinicId}/add_appointment', [App\Http\Controllers\AppointmentController::class, 'getAppointmentForm'])->name('receptionist.patient.add.appointment');
                    Route::post('/{clinicId}/store_appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('receptionist.patient.store.appointment');
                });
            });
        });
    });
});


