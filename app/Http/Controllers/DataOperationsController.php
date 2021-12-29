<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DataOperations;
use App\Models\SystemConfiguration;
use App\Models\Patient;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PatientsImport;
use App\Exports\PatientsExport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ReceptionistProfile;
use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\ReceptionistVisit;
use App\Models\Perscreption;
use App\Models\Diagnose;
use App\Models\Medicine;

class DataOperationsController extends Controller
{
    
    public function getImportExcelView(){
        $system_configurations = SystemConfiguration::all()->first();
        return view('receptionist.dashboard.dashboard_import_excel', ['system_configurations' => $system_configurations]);
    }

    public function importExcel(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            //'name' => 'required|mimes:xlsx,xls',
        ]);
        if ($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInput();   
        }
        if ($request->hasfile('excel_file')){
            $records_count = 0;
            $file = $request->file('excel_file');
            $path = $file->getRealPath();
            $patients = Excel::toArray(new PatientsImport, $file->store('temp'));
            if(!empty($patients) && count($patients)){
                foreach ($patients[0] as $patient) {
                    $records_count++;
                    $receptionistProfile =  Auth::user()->profile;
                    $new_patient = new Patient();
                    $new_patient->name =  $patient['name'] ? $patient['name'] : 'no name';
                    $new_patient->code = $patient['id'];
                    $new_patient->phone =  $patient['phone'] ? $patient['phone'] : 'no phone';
                    $new_patient->age = $patient['age'] ? $patient['age'] : 0;
                    $new_patient->gender = $patient['gender'] == 1 ? 'male' : 'female';
                    $new_patient->birthdate = Carbon::now();
                    $new_patient->attendance_date = Carbon::now();
                    //$patient['receptionist_name'] ? $patient['receptionist_name'] : 'no specialist';
                    $new_patient->receptionist_name = 'no specialist';
                    $new_patient->receptionistProfile()->associate($receptionistProfile)->save();
                    $receptionistProfile->patients()->save($new_patient);
                    $new_patient->addToIndex();

                    $appointment = new Appointment();
                    $appointment->date = Carbon::now()->toDateTimeString();
                    $appointment->from = Carbon::now()->toDateTimeString();
                    $appointment->to = Carbon::now()->toDateTimeString();
                    $appointment->leaved_at = Carbon::now()->toDateTimeString();
                    $appointment->patient()->associate($new_patient)->save();

                    $receptionistVisit = new ReceptionistVisit();
                    $receptionistVisit->receptionist()->associate($receptionistProfile)->save();
                    $receptionistVisit->save();
                    $receptionistVisit->appointment()->save($appointment);

                    if(!$patient['diagnose'] == null){
                        $perscreption = new Perscreption();
                        $diagnose = new Diagnose();
                        $diagnose->name = $patient['diagnose'];
                        $diagnose->save();
                        $perscreption->save();
                        $perscreption->diagnose()->save($diagnose);
                        $diagnose->perscreption()->associate($perscreption)->save();
    
                        $medicine = new Medicine();
                        $medicine->name = $patient['medicine'] ? $patient['medicine'] : 'no medicine';
                        $medicine->save();
                        $perscreption->medicines()->save($medicine);
                        $medicine->perscreption()->associate($perscreption)->save();

                        $appointment->perscreption()->save($perscreption);
                        $perscreption->appointment()->associate($appointment)->save();
                    }
                    
                }
                session()->flash('success', trans('lang.rec.import_data_success'));
                return redirect()->back(); 
            }
        }else{
            session()->flash('error', trans('lang.rec.please_import_file'));
            return redirect()->back(); 
        }
    }

    public function exportExcel(){
        return Excel::download(new PatientsExport, 'patients.xlsx');
    }

    public function importAccessDB(Request $request)
    {
        //dd(1);
        $patients = DB::connection('odbc')->table('patients')->get();
        return redirect()->back()->with('success', 'Files has been uploaded Successfully');
        /*
        $validator = Validator::make($request->all(),
        [
            //'name' => 'required|mimes:xlsx,xls',
        ]);
        if ($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInput();   
        }
        //session()->flash('error', "sorry we are encountering a formatting problem. please make sure that the database format is compatible");
        //return redirect()->back();
        if ($request->hasfile('access_db')){
            dd(2);
            $access_db = $request->file('access_db');
            $access_db_path = $access_db->getRealPath();
            $access_db_name = $access_db->getClientOriginalName();
            $access_db_rename = "patients.mdb";
            $access_db_extension = $access_db->extension();

            $path = '/access_databases/'.date('Y-m-d').'/';
            $access_db->move(public_path().$path, $access_db_rename);
            //$db_name = public_path().$path . $access_db_name;
            //$db = new \PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db_name; Uid=; Pwd=;");

            $patients = DB::connection('odbc')->table('patients')->get();
            return redirect()->back()->with('success', 'Files has been uploaded Successfully');
        }else{
            dd(3);
            session()->flash('error', trans('lang.rec.please_import_file'));
            return redirect()->back(); 
        }
        */
    }
}