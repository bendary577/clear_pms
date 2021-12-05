<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DataOperations;
use App\Models\Patient;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PatientsImport;
use App\Exports\PatientsExport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DataOperationsController extends Controller
{

    public function getImportExcelView(){
        return view('receptionist.dashboard.dashboard_import_excel');
    }

    public function importExcel(Request $request){

        $validator = Validator::make($request->all(),
        [
            //'name' => 'required|mimes:xlsx,xls',
        ]);
        
        if ($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInput();   
        }

        if ($request->hasfile('excel_file')){
            $file = $request->file('excel_file');
            $path = $file->getRealPath();
            $patients = Excel::toArray(new PatientsImport, $file->store('temp'));
            if(!empty($patients) && count($patients)){
                foreach ($patients[0] as $patient) {
                    Patient::create([
                        'name' => $patient['name'],
                        'phone' => $patient['phone'],
                        'age' => $patient['age'],
                        'code' => $patient['code'],
                        'gender' => $patient['gender'],
                        'birthdate' => date("Y-m-d", strtotime($patient['birthdate'])),
                        'attendance_date' => date("Y-m-d", strtotime($patient['attendance_date'])),
                    ]);
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
        //return (new PatientsExport)->download('patients.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return Excel::download(new PatientsExport, 'patients.xlsx');
    }

    public function importAccessDB(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            //'name' => 'required|mimes:xlsx,xls',
        ]);
        if ($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInput();   
        }
        session()->flash('error', "sorry we are encountering a formatting problem. please make sure that the database format is compatible");
        return redirect()->back();
        if ($request->hasfile('access_db')){
            $access_db = $request->file('access_db');
            $access_db_path = $access_db->getRealPath();
            $access_db_name = $access_db->getClientOriginalName();
            $access_db_extension = $access_db->extension();
            $path = '/access_databases/'.date('Y-m-d').'/';
            $access_db->move(public_path().$path, $access_db_name);
            $db_name = public_path().$path . $access_db_name;
            $db = new \PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db_name; Uid=; Pwd=;");
            return redirect()->back()->with('success', 'Files has been uploaded Successfully');
        }else{
            dd(3);
            session()->flash('error', trans('lang.rec.please_import_file'));
            return redirect()->back(); 
        }
    }
}
